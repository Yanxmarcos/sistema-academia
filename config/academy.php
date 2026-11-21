<?php

return [
    // Access to proposal screens only. Record-level permissions remain future work.
    'modules' => [
        'notificaciones' => ['label' => 'Notificaciones', 'icon' => 'bell', 'roles' => ['director', 'secretaria', 'docente', 'estudiante']],
        'asistencias' => ['label' => 'Asistencias', 'icon' => 'calendar-check', 'roles' => ['director', 'secretaria', 'docente', 'estudiante']],
        'horarios' => ['label' => 'Horarios', 'icon' => 'clock', 'roles' => ['director', 'secretaria', 'docente', 'estudiante']],
        'profesores' => ['label' => 'Profesores', 'icon' => 'chalkboard-teacher', 'roles' => ['director', 'secretaria']],
        'matriculas' => ['label' => 'Matrículas', 'icon' => 'user-graduate', 'roles' => ['director', 'secretaria']],
        'alumnos' => ['label' => 'Alumnos', 'icon' => 'users', 'roles' => ['director', 'secretaria', 'docente']],
        'deudas' => ['label' => 'Deudas', 'icon' => 'money-bill-wave', 'roles' => ['director', 'secretaria']],
    ],
];
