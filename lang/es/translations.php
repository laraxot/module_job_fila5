<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: lang/es/translations.php
return [
    'breadcrumb' => 'Monitor de Trabajos En Cola',
    'title' => 'Trabajos En Cola',
    'navigation_label' => 'Trabajos',
    'navigation_group' => 'Sistema',
    'total_jobs' => 'Total Trabajos Ejecutados',
    'execution_time' => 'Tiempo Total de Ejecución',
    'average_time' => 'Tiempo Promedio de Ejecución',
    'succeeded' => 'Exitoso',
    'failed' => 'Fallido',
    'running' => 'En ejecución',
    'status' => 'Estado',
    'name' => 'Nombre',
    'queue' => 'Cola',
    'progress' => 'Progreso',
    'started_at' => 'Iniciado a las',
    'created_at' => 'Creado a las',
    'reserved_at' => 'Reservado a las',
    'waiting_jobs' => 'Número de trabajos en espera',
    'attempts' => 'Intentos',
    'waiting' => 'En espera',
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
