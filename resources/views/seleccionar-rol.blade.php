<!DOCTYPE html>
<html lang="es-PE"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex, nofollow"><title>Seleccionar rol | Propuesta Newton</title><link rel="icon" href="{{ asset('favicon.ico') }}">@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="auth-page"><main class="auth-shell role-shell"><section class="auth-card">
    <img src="{{ asset('img/brand.png') }}" class="auth-logo" alt="Academia Newton"><h1>Elige cómo ingresar</h1><p>Hola, {{ auth()->user()->name }}. Tu cuenta tiene varios roles. El menú y los accesos se ajustarán al que selecciones.</p>
    @if($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif
    <form action="{{ route('seleccionar.rol.store') }}" method="POST" class="role-options">@csrf
        @foreach(auth()->user()->roles as $role)<button type="submit" name="role_id" value="{{ $role->id }}" class="role-option"><i class="fas {{ $role->name === 'docente' ? 'fa-chalkboard-teacher' : 'fa-user' }}" aria-hidden="true"></i><strong>{{ $role->display_name }}</strong><span>Explorar con este rol <i class="fas fa-arrow-right" aria-hidden="true"></i></span></button>@endforeach
    </form>
    <form action="{{ route('logout') }}" method="POST" class="mt-4">@csrf<button type="submit" class="btn btn-outline-secondary w-100">Cerrar sesión</button></form>
</section><p class="auth-caption">Los permisos se comprueban también en el servidor.</p></main></body></html>
