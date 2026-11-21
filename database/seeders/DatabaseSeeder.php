<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        if (config('demo.enabled')) {
            $this->call(UserSeeder::class);
        }
    }
}
