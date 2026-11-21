<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RoleController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing-page')->name('home');
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:login');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/seleccionar-rol', [RoleController::class, 'index'])->name('seleccionar.rol');
    Route::post('/seleccionar-rol', [RoleController::class, 'store'])->name('seleccionar.rol.store');
    Route::middleware('active.role')->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        foreach (array_keys(config('academy.modules')) as $module) {
            Route::view('/'.$module, $module.'.index')
                ->middleware('can:view-module,"'.$module.'"')
                ->name($module.'.index');
        }
    });
});
