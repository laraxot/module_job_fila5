<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: resources/lang/en/job_monitor.php
return [
    'navigation' => [
        'icon' => 'heroicon-o-eye',
        'group' => 'System',
        'label' => 'Job Monitor',
        'sort' => 88,
    ],
    'actions' => [
        'logout' => [
            'tooltip' => 'Logout',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
