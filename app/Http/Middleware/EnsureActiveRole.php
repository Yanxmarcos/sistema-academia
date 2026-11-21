<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureActiveRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (! $user) {
            return redirect()->route('login');
        }
        // Resolve membership on every request, including directors.
        if ($user->hasActiveRole()) {
            return $next($request);
        }
        $request->session()->forget(['active_role_id', 'active_role']);
        $roles = $user->roles()->get();
        if ($roles->isEmpty()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Tu cuenta no tiene roles asignados. Solicita acceso al administrador.',
            ]);
        }
        if ($roles->count() === 1) {
            $request->session()->put('active_role_id', $roles->first()->id);

            return $next($request);
        }

        return redirect()->route('seleccionar.rol');
    }
}
