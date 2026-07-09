<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: lang/nb_NO/translations.php
return [
    'breadcrumb' => 'Jobb-håndterer',
    'title' => 'Jobber',
    'navigation_label' => 'Jobber',
    'navigation_group' => 'Jobb-håndterer',
    'total_jobs' => 'Totalt antall jobber kjørt',
    'waiting_jobs' => 'Totalt antall jobber som venter',
    'execution_time' => 'Total kjøringstid',
    'average_time' => 'Gjen. kjøringstid',
    'succeeded' => 'Vellykket',
    'failed' => 'Mislykket',
    'running' => 'Kjører',
    'waiting' => 'Venter',
    'status' => 'Status',
    'attempts' => 'Forsøk',
    'name' => 'Navn',
    'queue' => 'Kø',
    'progress' => 'Framdrift',
    'started_at' => 'Startet',
    'created_at' => 'Opprettet',
    'reserved_at' => 'Reservert',
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
