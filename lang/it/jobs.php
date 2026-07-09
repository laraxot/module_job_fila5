<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: lang/it/jobs.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'queue' => [
            'label' => 'queue',
        ],
        'attempts' => [
            'label' => 'attempts',
        ],
        'available_at' => [
            'label' => 'available_at',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
    ],
];
