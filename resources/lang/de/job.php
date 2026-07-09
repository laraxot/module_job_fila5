<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: resources/lang/de/job.php
return [
    'actions' => [
        'create' => [
            'label' => 'Erstellen',
        ],
        'logout' => [
            'tooltip' => 'Abmelden',
            'icon' => 'logout',
            'label' => 'Abmelden',
        ],
        'cancel' => [
            'tooltip' => 'Abbrechen',
        ],
        'reorderRecords' => [
            'tooltip' => 'Datensätze neu anordnen',
        ],
    ],
    'fields' => [
        'edit' => [
            'label' => 'Bearbeiten',
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
        'id' => [
            'label' => 'ID',
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
        'attempts' => [
            'label' => 'Versuche',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reserved_at' => [
            'label' => 'Reserviert am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'available_at' => [
            'label' => 'Verfügbar am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Erstellt am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'sort' => 58,
        'icon' => 'heroicon-o-briefcase',
        'group' => 'System',
        'label' => 'Aufträge',
    ],
    'label' => 'Aufträge',
    'plural_label' => 'Missing Plural label',
];
