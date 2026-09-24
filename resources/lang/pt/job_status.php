<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: resources/lang/pt/job_status.php
return [
    'navigation' => [
        'icon' => 'heroicon-o-information-circle',
        'group' => 'Sistema',
        'label' => 'Status dos Trabalhos',
        'sort' => 89,
    ],
    'actions' => [
        'logout' => [
            'tooltip' => 'Sair',
            'icon' => 'logout',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
