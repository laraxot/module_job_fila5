<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: lang/it/failed_jobs.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'connection' => [
            'label' => 'connection',
        ],
        'queue' => [
            'label' => 'queue',
        ],
        'failed_at' => [
            'label' => 'failed_at',
        ],
    ],
];
