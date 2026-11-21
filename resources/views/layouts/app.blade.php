<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('titulo', 'Panel') | Propuesta Newton</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-page">
    <aside class="academy-sidebar" id="academySidebar">
        <button type="button" class="sidebar-close" id="sidebarClose" aria-label="Cerrar menú"><i class="fas fa-xmark" aria-hidden="true"></i></button>
        <a href="{{ route('dashboard') }}" class="academy-brand"><img src="{{ asset('img/brand.png') }}" alt=""><span>Academia Newton<small>Propuesta de plataforma</small></span></a>
        <div class="academy-user"><span class="user-monogram" aria-hidden="true">{{ mb_substr(auth()->user()->name, 0, 1) }}</span><div><strong>{{ auth()->user()->name }}</strong><small>{{ auth()->user()->active_role?->display_name }}</small></div></div>
        <nav aria-label="Módulos académicos">
            <a href="{{ route('dashboard') }}" @class(['active' => request()->routeIs('dashboard')])><i class="fas fa-home" aria-hidden="true"></i>Inicio</a>
            @foreach(config('academy.modules') as $module => $details)
                @can('view-module', $module)
                    <a href="{{ route($module.'.index') }}" @class(['active' => request()->routeIs($module.'.*')])><i class="fas fa-{{ $details['icon'] }}" aria-hidden="true"></i>{{ $details['label'] }}</a>
                @endcan
            @endforeach
        </nav>
        <div class="sidebar-bottom">
            @if(auth()->user()->roles()->count() > 1)<a href="{{ route('seleccionar.rol') }}">Cambiar rol</a>@endif
            <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>Cerrar sesión</button></form>
        </div>
    </aside>
    <div class="academy-main">
        <header class="academy-toolbar"><button type="button" id="sidebarToggle" class="sidebar-toggle" aria-controls="academySidebar" aria-expanded="false" aria-label="Abrir menú"><i class="fas fa-bars" aria-hidden="true"></i></button><a href="{{ route('home') }}">Ver propuesta pública <i class="fas fa-arrow-up-right-from-square" aria-hidden="true"></i></a><span class="status-tag">Prototipo local</span></header>
        <main class="academy-content"><h1>@yield('titulo')</h1><p class="screen-context">Acceso como {{ auth()->user()->active_role?->display_name }} · Información ilustrativa</p>@yield('contenido')</main>
        <footer class="academy-footer">Academia Newton · Propuesta para portafolio · {{ date('Y') }}</footer>
    </div>
</body>
</html>
