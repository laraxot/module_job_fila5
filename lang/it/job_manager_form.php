<?php

declare(strict_types=1);

return [
    'fields' => [
        'name' => ['label' => 'name', 'placeholder' => 'name', 'helper_text' => 'name', 'description' => 'name'],
        'job_id' => ['label' => 'job_id', 'placeholder' => 'job_id', 'helper_text' => 'job_id', 'description' => 'job_id'],
        'queue' => ['label' => 'queue', 'placeholder' => 'queue', 'helper_text' => 'queue', 'description' => 'queue'],
        'started_at' => ['label' => 'started_at', 'placeholder' => 'started_at', 'helper_text' => 'started_at', 'description' => 'started_at'],
        'finished_at' => ['label' => 'finished_at', 'placeholder' => 'finished_at', 'helper_text' => 'finished_at', 'description' => 'finished_at'],
        'failed' => ['label' => 'failed', 'placeholder' => 'failed', 'helper_text' => 'failed', 'description' => 'failed'],
        'attempt' => ['label' => 'attempt', 'placeholder' => 'attempt', 'helper_text' => 'attempt', 'description' => 'attempt'],
        'exception_message' => ['label' => 'exception_message', 'placeholder' => 'exception_message', 'helper_text' => 'exception_message', 'description' => 'exception_message'],
    ],
    'sections' => [
        'empty' => ['label' => 'empty', 'heading' => 'empty'],
    ],
];
