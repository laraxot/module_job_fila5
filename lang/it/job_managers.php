<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'id'],
        'name' => ['label' => 'name'],
        'created_at' => ['label' => 'created_at'],
<<<<<<< HEAD
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
=======
        'queue' => ['label' => 'queue'],
        'failed' => ['label' => 'failed'],
        'attempt' => ['label' => 'attempt'],
        'progress' => ['label' => 'progress'],
        'started_at' => ['label' => 'started_at'],
        'finished_at' => ['label' => 'finished_at'],
    ],
    'actions' => [
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
>>>>>>> laraxot/dev
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
    ],
];
