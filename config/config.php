<?php

declare(strict_types=1);

return [
    'name' => 'Job',
<<<<<<< HEAD
    'icon' => 'heroicon-o-briefcase',
=======
    'description' => 'Modulo per la gestione dei lavori in background e code',
    'icon' => 'heroicon-o-queue-list',
    'navigation' => [
        'enabled' => true,
        'sort' => 40,
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\Job\\Providers\\JobServiceProvider',
    ],
>>>>>>> c88446c (.)
];
