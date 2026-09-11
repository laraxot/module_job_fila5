<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'id'],
        'name' => ['label' => 'name'],
        'total_jobs' => ['label' => 'total_jobs'],
        'pending_jobs' => ['label' => 'pending_jobs'],
        'failed_jobs' => ['label' => 'failed_jobs'],
        'created_at' => ['label' => 'created_at'],
<<<<<<< HEAD
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'prune_batches' => ['label' => 'prune_batches', 'icon' => 'prune_batches', 'tooltip' => 'prune_batches'],
=======
        'finished_at' => ['label' => 'finished_at'],
        'cancelled_at' => ['label' => 'cancelled_at'],
    ],
    'actions' => [
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
>>>>>>> laraxot/dev
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
    ],
];
