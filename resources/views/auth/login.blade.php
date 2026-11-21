<!DOCTYPE html>
<html lang="es-PE"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex, nofollow"><title>Acceso | Propuesta Newton</title><link rel="icon" href="{{ asset('favicon.ico') }}">@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="auth-page">
    <main class="auth-shell">
        <a href="{{ route('home') }}" class="auth-back"><i class="fas fa-arrow-left" aria-hidden="true"></i> Volver a la propuesta</a>
        <section class="auth-card" aria-labelledby="loginTitle">
            <img src="{{ asset('img/brand.png') }}" class="auth-logo" alt="Academia Newton">
            <h1 id="loginTitle">Bienvenido a Newton</h1><p>Ingresa con una cuenta de demostración para explorar la propuesta académica.</p>
            <form action="{{ route('login') }}" method="POST">@csrf
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control mb-3" value="{{ old('email') }}" required maxlength="254" autocomplete="username" autofocus>
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group mb-3"><input type="password" id="password" name="password" class="form-control" required maxlength="1024" autocomplete="current-password"><button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Mostrar contraseña" aria-pressed="false"><i class="fas fa-eye" aria-hidden="true"></i></button></div>
                @if($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif
                <label class="remember-label"><input type="checkbox" name="remember" value="1"> Mantener mi sesión</label>
                <button type="submit" class="btn btn-success w-100 mt-3">Ingresar al sistema <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i></button>
            </form>
            <p class="auth-note">Acceso local de demostración. Los módulos administrativos muestran el alcance previsto de la propuesta.</p>
        </section>
        <p class="auth-caption">Academia Newton · Propuesta de portafolio</p>
    </main>
</body></html>
