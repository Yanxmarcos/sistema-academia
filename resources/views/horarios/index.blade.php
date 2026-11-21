@extends('layouts.app')
@section('titulo', 'Horarios académicos')
@section('contenido')
<section class="scope-notice"><i class="fas fa-circle-info" aria-hidden="true"></i><div><strong>Módulo propuesto · Sin operaciones de registro</strong><p>Organizar cursos, aulas y docentes por turno. Este diseño documenta funcionalidades previstas, todavía no implementadas.</p></div></section>
<section class="proposal-table"><h2>Flujo previsto</h2><p>La siguiente tabla describe la propuesta funcional. No contiene registros de personas.</p><div class="table-responsive"><table class="table"><thead><tr><th scope="col">Proceso</th><th scope="col">Información prevista</th><th scope="col">Resultado esperado</th></tr></thead><tbody><tr><th scope="row">Planificación semanal</th><td>Curso, día y franja horaria</td><td>Horario por sección</td></tr><tr><th scope="row">Asignación de aula</th><td>Aula y capacidad</td><td>Distribución de espacios</td></tr><tr><th scope="row">Consulta por rol</th><td>Docente o estudiante</td><td>Vista según la cuenta</td></tr></tbody></table></div><a href="{{ route('dashboard') }}" class="btn btn-outline-success mt-3">Volver al panel</a></section>
@endsection
