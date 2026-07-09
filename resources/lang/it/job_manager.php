<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: resources/lang/it/job_manager.php
return [
    'navigation' => [
        'label' => 'Gestore lavoro',
        'group' => 'Lavori',
        'icon' => 'heroicon-o-cog',
        'sort' => 43,
    ],
    'label' => 'Gestore lavoro',
    'plural_label' => 'Gestori lavoro',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'queue' => [
            'label' => 'Coda',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'status' => [
            'label' => 'Stato',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_heartbeat' => [
            'label' => 'Ultimo battito',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Creato il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'restart' => [
            'label' => 'Riavvia',
        ],
        'pause' => [
            'label' => 'Pausa',
        ],
        'resume' => [
            'label' => 'Riprendi',
        ],
    ],
];
