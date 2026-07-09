<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Job/docs/wiki — domain i18n only.
// File: resources/lang/fr/job_manager.php
return [
    'navigation' => [
        'label' => 'Gestionnaire d\'Emplois',
        'group' => 'Emplois',
        'icon' => 'heroicon-o-cog',
        'sort' => 43,
    ],
    'label' => 'Gestionnaire d\'Emplois',
    'plural_label' => 'Gestionnaires d\'Emplois',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Nom',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'queue' => [
            'label' => 'File d\'attente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'status' => [
            'label' => 'Statut',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'progress' => [
            'label' => 'Progrès',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'started_at' => [
            'label' => 'Démarré À',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_heartbeat' => [
            'label' => 'Dernier Battement',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Créé À',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Mis À Jour À',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Créer',
        ],
        'restart' => [
            'label' => 'Redémarrer',
        ],
        'pause' => [
            'label' => 'Pause',
        ],
        'resume' => [
            'label' => 'Reprendre',
        ],
    ],
];
