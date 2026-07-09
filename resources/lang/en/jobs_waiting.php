<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: resources/lang/en/jobs_waiting.php
return [
    'navigation' => [
        'label' => 'Jobs Waiting',
        'group' => 'Jobs',
        'icon' => 'heroicon-o-clock',
        'sort' => 30,
    ],
    'label' => 'Job Waiting',
    'plural_label' => 'Jobs Waiting',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'connection' => [
            'label' => 'Connection',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'queue' => [
            'label' => 'Queue',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'payload' => [
            'label' => 'Payload',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attempts' => [
            'label' => 'Attempts',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'status' => [
            'label' => 'Status',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'display_name' => [
            'label' => 'Display Name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reserved_at' => [
            'label' => 'Reserved At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'available_at' => [
            'label' => 'Available At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Created At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'process' => [
            'label' => 'Process',
        ],
        'retry' => [
            'label' => 'Retry',
        ],
    ],
];
