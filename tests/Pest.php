<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\Job\Database\Factories\JobBatchFactory;
use Modules\Job\Database\Factories\JobFactory;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobBatch;

/*
 * Bootstrap Pest — modulo Job.
 * Ogni file test dichiara uses(Modules\Job\Tests\TestCase::class).
 * Vietato pest()->extend() / expect()->extend() (PHPStan method.internalClass).
 */

/**
 * @param array<string, mixed> $attributes
 */
function createJob(array $attributes = []): Job
{
    return JobFactory::new()->createOne($attributes);
}

/**
 * @param array<string, mixed> $attributes
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
 * @param array<string, mixed> $attributes
 */
function createJobBatch(array $attributes = []): JobBatch
{
    return JobBatchFactory::new()->createOne($attributes);
}

/**
 * @param array<string, mixed> $attributes
 */
function makeJobBatch(array $attributes = []): JobBatch
{
    $batch = JobBatchFactory::new()->make($attributes);
    if (! $batch instanceof JobBatch) {
        throw new RuntimeException('Expected JobBatch model from factory');
    }

    return $batch;
=======
use Modules\Job\Models\Job;
use Modules\Job\Models\JobBatch;
use Modules\Job\Tests\TestCase;

/*
 * |--------------------------------------------------------------------------
 * | Test Case
 * |--------------------------------------------------------------------------
 * |
 * | The closure you provide to your test functions is always bound to a specific PHPUnit test
 * | case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
 * | need to change it using the "pest()" function to bind a different classes or traits.
 * |
 */

pest()->extend(TestCase::class)->in('Feature', 'Unit');

/*
 * |--------------------------------------------------------------------------
 * | Expectations
 * |--------------------------------------------------------------------------
 * |
 * | When you're writing tests, you often need to check that values meet certain conditions. The
 * | "expect()" function gives you access to a set of "expectations" methods that you can use
 * | to assert different things. Of course, you may extend the Expectation API at any time.
 * |
 */

expect()->extend('toBeJob', fn () => $this->toBeInstanceOf(Job::class));

expect()->extend('toBeJobBatch', fn () => $this->toBeInstanceOf(JobBatch::class));

/*
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | While Pest is very powerful out-of-the-box, you may have some testing code specific to your
 * | project that you don't want to repeat in every file. Here you can also expose helpers as
 * | global functions to help you to reduce the number of lines of code in your test files.
 * |
 */

function createJob(array $attributes = []): Job
{
    return Job::factory()->create($attributes);
}

function makeJob(array $attributes = []): Job
{
    return Job::factory()->make($attributes);
}

function createJobBatch(array $attributes = []): JobBatch
{
    return JobBatch::factory()->create($attributes);
}

function makeJobBatch(array $attributes = []): JobBatch
{
    return JobBatch::factory()->make($attributes);
>>>>>>> c88446c (.)
}
