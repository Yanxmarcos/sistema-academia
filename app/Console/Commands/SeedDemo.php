<?php

namespace App\Console\Commands;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SeedDemo extends Command
{
    protected $signature = 'demo:seed';

    protected $description = 'Crea o restablece las seis cuentas ficticias y muestra su contraseña local';

    public function handle(): int
    {
        if (! app()->environment(['local', 'testing']) || ! config('demo.enabled')) {
            $this->error('Este comando requiere APP_ENV=local/testing y DEMO_MODE=true.');

            return self::FAILURE;
        }
        $password = config('demo.password') ?: Str::password(20);
        config(['demo.password' => $password]);
        $this->call('db:seed', ['--class' => DatabaseSeeder::class, '--force' => true]);
        $this->info('Cuentas: director, secretaria, docente, estudiante, multirrol y ayudante @example.test');
        $this->line('Contraseña local: '.$password);
        $this->comment('Las cuentas demo existentes se restablecieron. Guarda esta contraseña fuera del repositorio.');

        return self::SUCCESS;
    }
}
