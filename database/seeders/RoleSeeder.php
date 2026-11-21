<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'director', 'display_name' => 'Director'],
            ['name' => 'secretaria', 'display_name' => 'Secretaria'],
            ['name' => 'docente', 'display_name' => 'Docente'],
            ['name' => 'estudiante', 'display_name' => 'Estudiante'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }
    }
}
