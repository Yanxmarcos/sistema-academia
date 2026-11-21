<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AccessSecurityTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['demo.enabled' => false, 'demo.password' => null]);
        $this->seed(RoleSeeder::class);
    }

    private function account(array $roles): User
    {
        $user = User::factory()->create(['password' => Hash::make('Local-test-credentials!')]);
        $user->roles()->sync(Role::whereIn('name', $roles)->pluck('id'));

        return $user;
    }

    public function test_guests_cannot_open_internal_pages(): void
    {
        foreach (['dashboard', 'seleccionar-rol', 'alumnos', 'deudas', 'matriculas', 'horarios', 'asistencias', 'profesores', 'notificaciones'] as $path) {
            $this->get('/'.$path)->assertRedirect('/login');
        }
    }

    public function test_single_role_login_sets_an_id_and_director_label(): void
    {
        $user = $this->account(['director']);
        $this->post('/login', ['email' => $user->email, 'password' => 'Local-test-credentials!'])
            ->assertRedirect('/dashboard')->assertSessionHas('active_role_id', $user->roles()->first()->id)->assertSessionMissing('active_role');
        $this->get('/dashboard')->assertOk()->assertSee('Director');
    }

    public function test_multirole_login_requires_choice_and_checks_membership(): void
    {
        $user = $this->account(['secretaria', 'docente']);
        $this->post('/login', ['email' => $user->email, 'password' => 'Local-test-credentials!'])
            ->assertRedirect('/seleccionar-rol')->assertSessionMissing('active_role_id');
        $this->get('/seleccionar-rol')->assertOk()->assertSee('Secretaria')->assertSee('Docente');
        $director = Role::where('name', 'director')->firstOrFail();
        $this->post('/seleccionar-rol', ['role_id' => $director->id])->assertForbidden()->assertSessionMissing('active_role_id');
        $teacher = $user->roles()->where('name', 'docente')->firstOrFail();
        $this->post('/seleccionar-rol', ['role_id' => $teacher->id])->assertRedirect('/dashboard')->assertSessionHas('active_role_id', $teacher->id);
        $this->get('/deudas')->assertForbidden();
        $this->get('/seleccionar-rol')->assertOk();
        $secretary = $user->roles()->where('name', 'secretaria')->firstOrFail();
        $this->post('/seleccionar-rol', ['role_id' => $secretary->id])->assertRedirect('/dashboard');
        $this->get('/deudas')->assertOk();
    }

    public function test_each_role_obeys_the_documented_access_matrix(): void
    {
        $matrix = [
            'director' => ['notificaciones', 'asistencias', 'horarios', 'profesores', 'matriculas', 'alumnos', 'deudas'],
            'secretaria' => ['notificaciones', 'asistencias', 'horarios', 'profesores', 'matriculas', 'alumnos', 'deudas'],
            'docente' => ['notificaciones', 'asistencias', 'horarios', 'alumnos'],
            'estudiante' => ['notificaciones', 'asistencias', 'horarios'],
        ];
        foreach ($matrix as $name => $allowed) {
            $user = $this->account([$name]);
            $this->actingAs($user)->withSession(['active_role_id' => $user->roles()->first()->id]);
            foreach (['notificaciones', 'asistencias', 'horarios', 'profesores', 'matriculas', 'alumnos', 'deudas'] as $module) {
                $this->get('/'.$module)->assertStatus(in_array($module, $allowed, true) ? 200 : 403);
            }
        }
    }

    public function test_student_menu_hides_restricted_modules(): void
    {
        $user = $this->account(['estudiante']);
        $this->actingAs($user)->get('/dashboard')->assertOk()->assertSee('Horarios')
            ->assertDontSee('href="'.route('deudas.index').'"', false)
            ->assertDontSee('href="'.route('alumnos.index').'"', false);
    }

    public function test_revoking_director_role_invalidates_access_and_session(): void
    {
        $user = $this->account(['director']);
        $this->actingAs($user)->withSession(['active_role_id' => $user->roles()->first()->id]);
        $user->roles()->detach();
        $this->get('/deudas')->assertRedirect('/login')->assertSessionMissing('active_role_id');
        $this->assertGuest();
    }

    public function test_revoked_active_role_cannot_be_used_with_remaining_memberships(): void
    {
        $user = $this->account(['secretaria', 'docente']);
        $secretary = $user->roles()->where('name', 'secretaria')->firstOrFail();
        $this->actingAs($user)->withSession(['active_role_id' => $secretary->id]);
        $user->roles()->detach($secretary);
        $this->get('/deudas')->assertForbidden();
        $this->get('/horarios')->assertOk();
    }

    public function test_account_without_roles_never_enters_a_redirect_loop(): void
    {
        $user = $this->account([]);
        $this->actingAs($user)->get('/seleccionar-rol')->assertRedirect('/login');
        $this->assertGuest();
        $this->post('/login', ['email' => $user->email, 'password' => 'Local-test-credentials!'])
            ->assertRedirect('/login')->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_login_clears_a_previous_active_role(): void
    {
        $user = $this->account(['estudiante']);
        $this->withSession(['active_role_id' => Role::where('name', 'director')->value('id')])
            ->post('/login', ['email' => $user->email, 'password' => 'Local-test-credentials!'])->assertRedirect('/dashboard');
        $this->get('/deudas')->assertForbidden();
    }

    public function test_login_is_limited_by_email_and_ip(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', ['email' => 'missing@example.test', 'password' => 'wrong'])->assertRedirect();
        }
        $this->post('/login', ['email' => 'MISSING@example.test', 'password' => 'wrong'])->assertStatus(429);
    }

    public function test_rotating_emails_does_not_bypass_the_ip_limit(): void
    {
        for ($i = 0; $i < 30; $i++) {
            $this->post('/login', ['email' => 'missing'.$i.'@example.test', 'password' => 'wrong'])->assertRedirect();
        }
        $this->post('/login', ['email' => 'another@example.test', 'password' => 'wrong'])->assertStatus(429);
    }

    public function test_malformed_login_values_return_validation_errors(): void
    {
        $this->post('/login', ['email' => ['invalid'], 'password' => ['invalid']])
            ->assertSessionHasErrors(['email', 'password']);
        $this->assertGuest();
    }

    public function test_logout_removes_the_active_role(): void
    {
        $user = $this->account(['estudiante']);
        $this->actingAs($user)->withSession(['active_role_id' => $user->roles()->first()->id]);
        $this->post('/logout')->assertRedirect('/')->assertSessionMissing('active_role_id');
        $this->assertGuest();
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_demo_command_is_disabled_by_default(): void
    {
        $this->artisan('demo:seed')->assertExitCode(1);
        $this->assertDatabaseCount('users', 0);
    }

    public function test_demo_command_generates_six_fictitious_accounts_and_resets_them(): void
    {
        config(['demo.enabled' => true]);
        $this->artisan('demo:seed')->assertExitCode(0);
        $this->assertDatabaseCount('users', 6);
        $first = User::where('email', 'director@example.test')->firstOrFail();
        $this->assertFalse(Hash::check('password', $first->password));
        $oldHash = $first->password;
        config(['demo.password' => null]);
        $this->artisan('demo:seed')->assertExitCode(0);
        $this->assertDatabaseCount('users', 6);
        $this->assertNotSame($oldHash, $first->fresh()->password);
    }

    public function test_demo_seeder_refuses_production_even_when_enabled(): void
    {
        config(['demo.enabled' => true, 'demo.password' => 'Local-test-credentials!']);
        $this->app->detectEnvironment(fn () => 'production');
        $this->expectException(\RuntimeException::class);
        $this->app->make(UserSeeder::class)->run();
    }
}
