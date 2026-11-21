@extends('layouts.app')
@section('titulo', 'Panel de control')
@section('contenido')
    <section class="overview-intro"><div><h2>Una academia, un solo lugar.</h2><p>Esta propuesta conecta la atención al estudiante con la organización académica y administrativa.</p><p class="mb-0"><strong>Tu rol activo:</strong> {{ auth()->user()->active_role?->display_name }}. Explora los módulos disponibles en el menú.</p></div><img src="{{ asset('img/demo/aprendizaje.svg') }}" alt="Aprender, practicar y avanzar"></section>
    <section class="scope-notice"><i class="fas fa-circle-info" aria-hidden="true"></i><div><strong>Alcance de esta versión</strong><p>El inicio de sesión, la selección de roles y la autorización funcionan. Los módulos siguientes documentan flujos previstos; todavía no registran ni modifican información académica.</p></div></section>
    <h2 class="modules-heading">Explora la propuesta</h2>
    <div class="module-grid">@foreach(config('academy.modules') as $module => $details)@can('view-module', $module)<a href="{{ route($module.'.index') }}" class="module-link"><i class="fas fa-{{ $details['icon'] }}" aria-hidden="true"></i><div><h3>{{ $details['label'] }}</h3><span>Ver alcance propuesto</span></div><i class="fas fa-arrow-right" aria-hidden="true"></i></a>@endcan
@endforeach</div>
@endsection
