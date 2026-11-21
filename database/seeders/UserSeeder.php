<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $password = config('demo.password');
        if (! app()->environment(['local', 'testing']) || ! config('demo.enabled') || ! is_string($password) || strlen($password) < 12) {
            throw new RuntimeException('Las cuentas ficticias requieren entorno local/testing, DEMO_MODE=true y una contraseña de al menos 12 caracteres. Usa php artisan demo:seed.');
        }
        $accounts = [
            'director' => ['Dirección Demo', ['director']],
            'secretaria' => ['Secretaría Demo', ['secretaria']],
            'docente' => ['Docente Demo', ['docente']],
            'estudiante' => ['Estudiante Demo', ['estudiante']],
            'multirrol' => ['Coordinación Demo', ['secretaria', 'docente']],
            'ayudante' => ['Ayudante Demo', ['secretaria', 'estudiante']],
        ];
        foreach ($accounts as $account => [$name, $roles]) {
            $user = User::updateOrCreate(
                ['email' => $account.'@example.test'],
                ['name' => $name, 'password' => Hash::make($password)],
            );
            $user->roles()->sync(Role::whereIn('name', $roles)->pluck('id'));
        }
    }
}
