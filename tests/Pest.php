<?php

declare(strict_types=1);

use Modules\Job\Database\Factories\JobBatchFactory;
use Modules\Job\Database\Factories\JobFactory;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobBatch;

/*
 * Bootstrap Pest — modulo Job.
 * Ogni file test dichiara uses(\Modules\Job\Tests\TestCase::class).
 * Per estendere si usa l'API idiomatica di Pest — `pest()->extend(...)`, in fondo
 * a questo file — senza nessuna annotazione di soppressione: con
 * `pestphp/pest-plugin-phpstan 5.2.0` installato, `method.internalClass` non
 * viene piu' segnalato. Misurato il 2026-08-25 su tutti i bootstrap dei moduli:
 * `phpstan analyse Modules/<Modulo>/tests/Pest.php` = 0 errori.
 * Se ricomparisse, verificare che il plugin sia ancora caricato da
 * `phpstan/extension-installer`, non reintrodurre il divieto.
 * Vedi story XOT-5.41 e ROOT-17.6.
 */

/**
 * @param  array<string, mixed>  $attributes
 */
function createJob(array $attributes = []): Job
{
    return JobFactory::new()->createOne($attributes);
}

/**
 * @param  array<string, mixed>  $attributes
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
 * @param  array<string, mixed>  $attributes
 */
function createJobBatch(array $attributes = []): JobBatch
{
    return JobBatchFactory::new()->createOne($attributes);
}

/**
 * @param  array<string, mixed>  $attributes
 */
function makeJobBatch(array $attributes = []): JobBatch
{
    $batch = JobBatchFactory::new()->make($attributes);
    if (! $batch instanceof JobBatch) {
        throw new RuntimeException('Expected JobBatch model from factory');
    }

    return $batch;
}

pest()->extend(\Modules\Job\Tests\TestCase::class)->in(__DIR__.'/Unit', __DIR__.'/Feature');
