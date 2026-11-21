<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Gate::define('view-module', fn (User $user, string $module) => $user->canAccessModule($module));
        RateLimiter::for('login', function (Request $request) {
            $email = $request->input('email');
            $identity = is_string($email) ? Str::lower($email) : 'invalid-email';

            return [
                Limit::perMinute(5)->by(hash('sha256', $identity.'|'.$request->ip())),
                Limit::perMinute(30)->by('login-ip:'.$request->ip()),
            ];
        });
    }
}
