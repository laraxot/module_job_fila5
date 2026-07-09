<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: resources/lang/de/failed_import_row.php
return [
    'navigation' => [
        'label' => 'Fehlgeschlagene Importzeile',
        'group' => 'Fehlgeschlagene Importzeilen',
        'icon' => 'heroicon-o-exclamation-circle',
        'sort' => 28,
    ],
    'label' => 'Fehlgeschlagene Importzeile',
    'plural_label' => 'Fehlgeschlagene Importzeilen',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'import_batch_id' => [
            'label' => 'Import-Batch-ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'row_index' => [
            'label' => 'Zeilenindex',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'errors' => [
            'label' => 'Fehler',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'data' => [
            'label' => 'Daten',
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
        'view_errors' => [
            'label' => 'Fehler Anzeigen',
        ],
        'fix_row' => [
            'label' => 'Zeile Korrigieren',
        ],
    ],
];
