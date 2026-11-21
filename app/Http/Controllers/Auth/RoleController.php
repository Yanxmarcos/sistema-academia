<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = $request->user()->roles()->get();
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

            return redirect()->route('dashboard');
        }

        return view('seleccionar-rol');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['role_id' => ['required', 'integer']]);
        $role = $request->user()->roles()->find($validated['role_id']);
        abort_unless($role, 403, 'El rol seleccionado no pertenece a tu cuenta.');
        $request->session()->regenerate();
        $request->session()->put('active_role_id', $role->id);

        return redirect()->route('dashboard');
    }
}
