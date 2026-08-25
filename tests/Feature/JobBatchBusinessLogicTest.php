<?php

declare(strict_types=1);

use Modules\Job\Models\Job;
use Modules\Job\Models\JobBatch;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\json_decode;
use function Safe\json_encode;

uses(TestCase::class);

function uniqueJobBatchId(string $prefix = 'batch'): string
{
    return $prefix.'-'.str_replace('.', '', uniqid('', true));
}

it('can create job batch with basic information', function (): void {
    /** @var TestCase $this */
    $batchId = uniqueJobBatchId('basic');
    $batchData = [
        'id' => $batchId,
        'name' => 'Processamento utenti batch',
        'total_jobs' => 100,
        'pending_jobs' => 100,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
       'options' => [
=======
        'options' => [
>>>>>>> laraxot/dev
            'priority' => 'high',
            'notify_on_completion' => true,
        ],
        'cancelled_at' => null,
        'finished_at' => null,
    ];

    $batch = JobBatch::create($batchData);

<<<<<<< HEAD
   $this->assertDatabaseHasRow('job_batches', [
=======
    $this->assertDatabaseHasRow('job_batches', [
>>>>>>> laraxot/dev
        'id' => $batchId,
        'name' => 'Processamento utenti batch',
        'total_jobs' => 100,
        'pending_jobs' => 100,
        'failed_jobs' => 0,
    ]);

<<<<<<< HEAD
   Assert::assertSame($batchId, $batch->id);
=======
    Assert::assertSame($batchId, $batch->id);
>>>>>>> laraxot/dev
    Assert::assertSame('Processamento utenti batch', $batch->name);
    Assert::assertSame(100, $batch->total_jobs);
    Assert::assertSame(100, $batch->pending_jobs);
    Assert::assertSame(0, $batch->failed_jobs);
});

it('can manage batch job progression', function (): void {
    /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('progression'),
        'name' => 'Test progressione',
        'total_jobs' => 10,
        'pending_jobs' => 10,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
       'options' => [],
=======
        'options' => [],
>>>>>>> laraxot/dev
    ]);

    Assert::assertSame(10, $batch->pending_jobs);
    Assert::assertSame(0, $batch->failed_jobs);
    // Simula completamento di alcuni job
    $batch->update([
        'pending_jobs' => 7,
    ]);

<<<<<<< HEAD
   Assert::assertSame(7, $batch->pending_jobs);
=======
    Assert::assertSame(7, $batch->pending_jobs);
>>>>>>> laraxot/dev
    Assert::assertSame(3, $batch->total_jobs - $batch->pending_jobs);
});

it('can handle batch job failures', function (): void {
    /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('failure'),
        'name' => 'Test fallimenti',
        'total_jobs' => 5,
        'pending_jobs' => 5,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
       'options' => [],
=======
        'options' => [],
>>>>>>> laraxot/dev
    ]);

    // Simula fallimento di alcuni job
    $failedJobIds = ['job-1', 'job-3'];
    $batch->update([
        'failed_jobs' => 2,
        'failed_job_ids' => json_encode($failedJobIds),
        'pending_jobs' => 3,
    ]);

<<<<<<< HEAD
   Assert::assertSame(2, $batch->failed_jobs);
=======
    Assert::assertSame(2, $batch->failed_jobs);
>>>>>>> laraxot/dev
    Assert::assertSame(3, $batch->pending_jobs);
    Assert::assertSame($failedJobIds, json_decode($batch->failed_job_ids, true));
});

it('can manage batch completion status', function (): void {
    /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('completion'),
        'name' => 'Test completamento',
        'total_jobs' => 3,
        'pending_jobs' => 3,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
       'options' => [],
=======
        'options' => [],
>>>>>>> laraxot/dev
    ]);

    Assert::assertFalse($batch->finished());
    Assert::assertFalse($batch->cancelled());
    // Simula completamento
    $batch->update([
        'pending_jobs' => 0,
        'finished_at' => now(),
    ]);

<<<<<<< HEAD
   Assert::assertTrue($batch->finished());
=======
    Assert::assertTrue($batch->finished());
>>>>>>> laraxot/dev
    Assert::assertFalse($batch->cancelled());
});

it('can handle batch cancellation', function (): void {
    /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('cancellation'),
        'name' => 'Test cancellazione',
        'total_jobs' => 5,
        'pending_jobs' => 5,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
       'options' => [],
=======
        'options' => [],
>>>>>>> laraxot/dev
    ]);

    Assert::assertFalse($batch->cancelled());
    // Cancella il batch
    $batch->update([
        'cancelled_at' => now(),
    ]);

<<<<<<< HEAD
   Assert::assertTrue($batch->cancelled());
=======
    Assert::assertTrue($batch->cancelled());
>>>>>>> laraxot/dev
});

it('can manage batch options and configuration', function (): void {
    /** @var TestCase $this */
    $options = [
        'priority' => 'high',
        'notify_on_completion' => true,
        'retry_failed_jobs' => true,
        'max_retries' => 3,
        'timeout' => 3600,
        'tags' => ['user_processing', 'batch'],
    ];

    $batch = JobBatch::create([
<<<<<<< HEAD
       'id' => uniqueJobBatchId('options'),
=======
        'id' => uniqueJobBatchId('options'),
>>>>>>> laraxot/dev
        'name' => 'Test opzioni',
        'total_jobs' => 10,
        'pending_jobs' => 10,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
       'options' => $options,
=======
        'options' => $options,
>>>>>>> laraxot/dev
    ]);

    $storedOptions = $batch->options?->all() ?? [];
    Assert::assertSame($options, $storedOptions);
    Assert::assertSame('high', $storedOptions['priority']);
    Assert::assertArrayHasKey('notify_on_completion', $storedOptions);
});

it('can calculate batch progress percentage', function (): void {
    /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('progress'),
        'name' => 'Test progresso',
        'total_jobs' => 100,
        'pending_jobs' => 75,
        'failed_jobs' => 5,
        'failed_job_ids' => json_encode(['job-1', 'job-2', 'job-3', 'job-4', 'job-5']),
<<<<<<< HEAD
       'options' => [],
=======
        'options' => [],
>>>>>>> laraxot/dev
    ]);

    // Calcola progresso: (total - pending) / total
    $completedJobs = $batch->total_jobs - $batch->pending_jobs;
    $progressPercentage = ($completedJobs / $batch->total_jobs) * 100;

<<<<<<< HEAD
   Assert::assertSame(25, $completedJobs);
=======
    Assert::assertSame(25, $completedJobs);
>>>>>>> laraxot/dev
    Assert::assertSame(25.0, $progressPercentage);
});

it('can handle batch job relationships', function (): void {
    /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('relationships'),
        'name' => 'Test relazioni',
        'total_jobs' => 3,
        'pending_jobs' => 3,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
       'options' => [],
=======
        'options' => [],
>>>>>>> laraxot/dev
    ]);

    // Crea job associati al batch
    $job1 = Job::create([
        'queue' => 'batch',
<<<<<<< HEAD
       'payload' => [
=======
        'payload' => [
>>>>>>> laraxot/dev
            'displayName' => 'BatchJob1',
            'batch_id' => $batch->id,
        ],
        'attempts' => 0,
        'available_at' => now()->timestamp,
    ]);

    $job2 = Job::create([
        'queue' => 'batch',
<<<<<<< HEAD
       'payload' => [
=======
        'payload' => [
>>>>>>> laraxot/dev
            'displayName' => 'BatchJob2',
            'batch_id' => $batch->id,
        ],
        'attempts' => 0,
        'available_at' => now()->timestamp,
    ]);

    // Verifica che i job siano associati al batch
<<<<<<< HEAD
   Assert::assertSame($batch->id, $job1->payload['batch_id'] ?? null);
=======
    Assert::assertSame($batch->id, $job1->payload['batch_id'] ?? null);
>>>>>>> laraxot/dev
    Assert::assertSame($batch->id, $job2->payload['batch_id'] ?? null);
});

it('can manage batch cleanup and maintenance', function (): void {
    /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('cleanup'),
        'name' => 'Test pulizia',
        'total_jobs' => 10,
        'pending_jobs' => 0,
        'failed_jobs' => 2,
        'failed_job_ids' => json_encode(['job-1', 'job-2']),
<<<<<<< HEAD
       'options' => [],
=======
        'options' => [],
>>>>>>> laraxot/dev
        'finished_at' => now()->subDays(7),
    ]);

    Assert::assertTrue($batch->finished());
    Assert::assertNotNull($batch->finished_at);
    // Verifica che il batch sia candidato per la pulizia
    Assert::assertTrue($batch->finished_at->lessThan(now()->subDays(5)));
});

it('can handle batch retry logic', function (): void {
    /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('retry'),
        'name' => 'Test retry',
        'total_jobs' => 5,
        'pending_jobs' => 0,
        'failed_jobs' => 3,
        'failed_job_ids' => json_encode(['job-1', 'job-2', 'job-3']),
<<<<<<< HEAD
       'options' => [
=======
        'options' => [
>>>>>>> laraxot/dev
            'retry_failed_jobs' => true,
            'max_retries' => 2,
        ],
        'finished_at' => now(),
    ]);

    Assert::assertSame(3, $batch->failed_jobs);
    $retryOptions = $batch->options?->all() ?? [];
    Assert::assertSame(true, $retryOptions['retry_failed_jobs'] ?? null);
    // Simula retry dei job falliti
    $batch->update([
        'pending_jobs' => 3,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
        'finished_at' => null,
    ]);

<<<<<<< HEAD
   Assert::assertSame(0, $batch->failed_jobs);
=======
    Assert::assertSame(0, $batch->failed_jobs);
>>>>>>> laraxot/dev
    Assert::assertSame(3, $batch->pending_jobs);
    Assert::assertFalse($batch->finished());
});

it('can handle batch notification settings', function (): void {
    /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('notification'),
        'name' => 'Test notifiche',
        'total_jobs' => 10,
        'pending_jobs' => 10,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
       'options' => [
=======
        'options' => [
>>>>>>> laraxot/dev
            'notify_on_completion' => true,
            'notify_on_failure' => true,
            'notification_email' => 'admin@example.com',
            'notification_slack' => 'https://hooks.slack.com/...',
<<<<<<< HEAD
       ],
=======
        ],
>>>>>>> laraxot/dev
    ]);

    $options = $batch->options?->all() ?? [];
    Assert::assertSame(true, $options['notify_on_completion'] ?? null);
    Assert::assertSame(true, $options['notify_on_failure'] ?? null);
    Assert::assertSame('admin@example.com', $options['notification_email'] ?? null);
    Assert::assertSame('https://hooks.slack.com/...', $options['notification_slack'] ?? null);
});

it('can handle batch bulk operations', function (): void {
    /** @var TestCase $this */
    // Crea un batch di batch per testare operazioni bulk
    $batchList = [];
    $priorities = ['active', 'completed', 'failed'];

    for ($i = 1; $i <= 3; $i++) {
        $batchList[] = JobBatch::create([
            'id' => uniqueJobBatchId("bulk-{$i}"),
            'name' => "Batch bulk {$i}",
            'total_jobs' => $i * 10,
            'pending_jobs' => $i * 5,
            'failed_jobs' => $i,
            'failed_job_ids' => json_encode(["failed-job-{$i}"]),
<<<<<<< HEAD
           'options' => ['priority' => $priorities[$i - 1]],
=======
            'options' => ['priority' => $priorities[$i - 1]],
>>>>>>> laraxot/dev
        ]);
    }

    Assert::assertCount(3, $batchList);
    foreach ($batchList as $index => $batch) {
        Assert::assertNotEmpty($batch->id);
        Assert::assertSame(($index + 1) * 10, $batch->total_jobs);
        $batchOptions = $batch->options?->all() ?? [];
        Assert::assertSame($priorities[$index], $batchOptions['priority'] ?? null);
    }
});

it('can validate batch integrity', function (): void {
<<<<<<< HEAD
   /** @var TestCase $this */
=======
    /** @var TestCase $this */
>>>>>>> laraxot/dev
    // Test con batch valido
    $validBatch = JobBatch::create([
        'id' => uniqueJobBatchId('valid'),
        'name' => 'Batch valido',
        'total_jobs' => 10,
        'pending_jobs' => 10,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
       'options' => [],
=======
        'options' => [],
>>>>>>> laraxot/dev
    ]);

    Assert::assertNotNull($validBatch->id);
    // Verifica che i contatori siano coerenti

    Assert::assertLessThanOrEqual($validBatch->total_jobs, $validBatch->pending_jobs + $validBatch->failed_jobs);
});
