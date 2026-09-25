<?php

declare(strict_types=1);

use Modules\Job\Database\Factories\JobBatchFactory;
use Modules\Job\Database\Factories\JobFactory;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobBatch;

/*
 * Bootstrap Pest — modulo Job.
<<<<<<< HEAD
 * Ogni file test dichiara uses(\Modules\Job\Tests\TestCase::class).
=======
 * Ogni file test dichiara uses(Modules\Job\Tests\TestCase::class).
>>>>>>> laraxot/dev
 * Vietato pest()->extend() / expect()->extend() (PHPStan method.internalClass).
 */

/**
<<<<<<< HEAD
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
 */
function createJob(array $attributes = []): Job
{
    return JobFactory::new()->createOne($attributes);
}

/**
<<<<<<< HEAD
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
 */
function makeJob(array $attributes = []): Job
{
    $job = JobFactory::new()->make($attributes);
    if (! $job instanceof Job) {
        throw new RuntimeException('Expected Job model from factory');
    }

    return $job;
}

/**
<<<<<<< HEAD
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
 */
function createJobBatch(array $attributes = []): JobBatch
{
    return JobBatchFactory::new()->createOne($attributes);
}

/**
<<<<<<< HEAD
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
 */
function makeJobBatch(array $attributes = []): JobBatch
{
    $batch = JobBatchFactory::new()->make($attributes);
    if (! $batch instanceof JobBatch) {
        throw new RuntimeException('Expected JobBatch model from factory');
    }

    return $batch;
}
