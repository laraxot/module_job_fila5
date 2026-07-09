<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: resources/lang/es/job.php
return [
    'actions' => [
        'create' => [
            'label' => 'Crear',
        ],
        'logout' => [
            'tooltip' => 'Cerrar sesión',
            'icon' => 'heroicon-o-arrow-left-on-rectangle',
            'label' => 'Cerrar sesión',
        ],
        'cancel' => [
            'tooltip' => 'Cancelar',
        ],
        'reorderRecords' => [
            'tooltip' => 'Reordenar registros',
        ],
    ],
    'fields' => [
        'edit' => [
            'label' => 'Editar',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'payload' => [
            'label' => 'Contenido',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'queue' => [
            'label' => 'Cola',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attempts' => [
            'label' => 'Intentos',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reserved_at' => [
            'label' => 'Reservado en',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'available_at' => [
            'label' => 'Disponible en',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Creado en',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'sort' => 58,
        'icon' => 'heroicon-o-cog',
        'group' => 'Trabajos',
        'label' => 'Trabajo',
    ],
    'label' => 'Trabajo',
    'plural_label' => 'Trabajos',
];
