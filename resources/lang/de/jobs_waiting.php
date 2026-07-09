<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: resources/lang/de/jobs_waiting.php
return [
    'navigation' => [
        'label' => 'Wartende Aufträge',
        'group' => 'Aufträge',
        'icon' => 'heroicon-o-clock',
        'sort' => 30,
    ],
    'label' => 'Wartender Auftrag',
    'plural_label' => 'Wartende Aufträge',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'connection' => [
            'label' => 'Verbindung',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'queue' => [
            'label' => 'Warteschlange',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'payload' => [
            'label' => 'Nutzlast',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attempts' => [
            'label' => 'Versuche',
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
            'label' => 'Anzeigename',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reserved_at' => [
            'label' => 'Reserviert Am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'available_at' => [
            'label' => 'Verfügbar Am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Erstellt Am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'process' => [
            'label' => 'Verarbeiten',
        ],
        'retry' => [
            'label' => 'Wiederholen',
        ],
    ],
];
