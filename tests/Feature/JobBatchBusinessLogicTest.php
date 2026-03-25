<?php

declare(strict_types=1);

use Modules\Job\Models\Job;
use Modules\Job\Models\JobBatch;
use Modules\Job\Tests\TestCase;
<<<<<<< HEAD
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
=======

uses(TestCase::class);

it('can create job batch with basic information', function (): void {
    $batchData = [
        'id' => 'batch-123',
>>>>>>> c88446c (.)
        'name' => 'Processamento utenti batch',
        'total_jobs' => 100,
        'pending_jobs' => 100,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
        'options' => [
            'priority' => 'high',
            'notify_on_completion' => true,
        ],
=======
        'options' => json_encode([
            'priority' => 'high',
            'notify_on_completion' => true,
        ]),
>>>>>>> c88446c (.)
        'cancelled_at' => null,
        'finished_at' => null,
    ];

    $batch = JobBatch::create($batchData);

<<<<<<< HEAD
    $this->assertDatabaseHasRow('job_batches', [
        'id' => $batchId,
=======
    $this->assertDatabaseHas('job_batches', [
        'id' => 'batch-123',
>>>>>>> c88446c (.)
        'name' => 'Processamento utenti batch',
        'total_jobs' => 100,
        'pending_jobs' => 100,
        'failed_jobs' => 0,
    ]);

<<<<<<< HEAD
    Assert::assertSame($batchId, $batch->id);
    Assert::assertSame('Processamento utenti batch', $batch->name);
    Assert::assertSame(100, $batch->total_jobs);
    Assert::assertSame(100, $batch->pending_jobs);
    Assert::assertSame(0, $batch->failed_jobs);
});

it('can manage batch job progression', function (): void {
        /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('progression'),
=======
    expect($batch->id)->toBe('batch-123');
    expect($batch->name)->toBe('Processamento utenti batch');
    expect($batch->total_jobs)->toBe(100);
    expect($batch->pending_jobs)->toBe(100);
    expect($batch->failed_jobs)->toBe(0);
});

it('can manage batch job progression', function (): void {
    $batch = JobBatch::create([
        'id' => 'progression-test',
>>>>>>> c88446c (.)
        'name' => 'Test progressione',
        'total_jobs' => 10,
        'pending_jobs' => 10,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
        'options' => [],
    ]);

    Assert::assertSame(10, $batch->pending_jobs);
    Assert::assertSame(0, $batch->failed_jobs);
=======
        'options' => json_encode([]),
    ]);

    expect($batch->pending_jobs)->toBe(10);
    expect($batch->failed_jobs)->toBe(0);

>>>>>>> c88446c (.)
    // Simula completamento di alcuni job
    $batch->update([
        'pending_jobs' => 7,
    ]);

<<<<<<< HEAD
    Assert::assertSame(7, $batch->pending_jobs);
    Assert::assertSame(3, $batch->total_jobs - $batch->pending_jobs);
});

it('can handle batch job failures', function (): void {
        /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('failure'),
=======
    expect($batch->pending_jobs)->toBe(7);
    expect($batch->total_jobs - $batch->pending_jobs)->toBe(3);
});

it('can handle batch job failures', function (): void {
    $batch = JobBatch::create([
        'id' => 'failure-test',
>>>>>>> c88446c (.)
        'name' => 'Test fallimenti',
        'total_jobs' => 5,
        'pending_jobs' => 5,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
        'options' => [],
=======
        'options' => json_encode([]),
>>>>>>> c88446c (.)
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
    Assert::assertSame(3, $batch->pending_jobs);
    Assert::assertSame($failedJobIds, json_decode($batch->failed_job_ids, true));
});

it('can manage batch completion status', function (): void {
        /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('completion'),
=======
    expect($batch->failed_jobs)->toBe(2);
    expect($batch->pending_jobs)->toBe(3);
    expect(json_decode($batch->failed_job_ids, true))->toBe($failedJobIds);
});

it('can manage batch completion status', function (): void {
    $batch = JobBatch::create([
        'id' => 'completion-test',
>>>>>>> c88446c (.)
        'name' => 'Test completamento',
        'total_jobs' => 3,
        'pending_jobs' => 3,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
        'options' => [],
    ]);

    Assert::assertFalse($batch->finished());
    Assert::assertFalse($batch->cancelled());
=======
        'options' => json_encode([]),
    ]);

    expect($batch->finished())->toBeFalse();
    expect($batch->cancelled())->toBeFalse();

>>>>>>> c88446c (.)
    // Simula completamento
    $batch->update([
        'pending_jobs' => 0,
        'finished_at' => now(),
    ]);

<<<<<<< HEAD
    Assert::assertTrue($batch->finished());
    Assert::assertFalse($batch->cancelled());
});

it('can handle batch cancellation', function (): void {
        /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('cancellation'),
=======
    expect($batch->finished())->toBeTrue();
    expect($batch->cancelled())->toBeFalse();
});

it('can handle batch cancellation', function (): void {
    $batch = JobBatch::create([
        'id' => 'cancellation-test',
>>>>>>> c88446c (.)
        'name' => 'Test cancellazione',
        'total_jobs' => 5,
        'pending_jobs' => 5,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
        'options' => [],
    ]);

    Assert::assertFalse($batch->cancelled());
=======
        'options' => json_encode([]),
    ]);

    expect($batch->cancelled())->toBeFalse();

>>>>>>> c88446c (.)
    // Cancella il batch
    $batch->update([
        'cancelled_at' => now(),
    ]);

<<<<<<< HEAD
    Assert::assertTrue($batch->cancelled());
});

it('can manage batch options and configuration', function (): void {
        /** @var TestCase $this */
=======
    expect($batch->cancelled())->toBeTrue();
});

it('can manage batch options and configuration', function (): void {
>>>>>>> c88446c (.)
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
        'id' => 'options-test',
>>>>>>> c88446c (.)
        'name' => 'Test opzioni',
        'total_jobs' => 10,
        'pending_jobs' => 10,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
        'options' => $options,
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
=======
        'options' => json_encode($options),
    ]);

    expect(json_decode($batch->options, true))->toBe($options);
    expect(json_decode($batch->options, true)['priority'])->toBe('high');
    expect(json_decode($batch->options, true)['notify_on_completion'])->toBeTrue();
});

it('can calculate batch progress percentage', function (): void {
    $batch = JobBatch::create([
        'id' => 'progress-test',
>>>>>>> c88446c (.)
        'name' => 'Test progresso',
        'total_jobs' => 100,
        'pending_jobs' => 75,
        'failed_jobs' => 5,
        'failed_job_ids' => json_encode(['job-1', 'job-2', 'job-3', 'job-4', 'job-5']),
<<<<<<< HEAD
        'options' => [],
=======
        'options' => json_encode([]),
>>>>>>> c88446c (.)
    ]);

    // Calcola progresso: (total - pending) / total
    $completedJobs = $batch->total_jobs - $batch->pending_jobs;
    $progressPercentage = ($completedJobs / $batch->total_jobs) * 100;

<<<<<<< HEAD
    Assert::assertSame(25, $completedJobs);
    Assert::assertSame(25.0, $progressPercentage);
});

it('can handle batch job relationships', function (): void {
        /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('relationships'),
=======
    expect($completedJobs)->toBe(25);
    expect($progressPercentage)->toBe(25.0);
});

it('can handle batch job relationships', function (): void {
    $batch = JobBatch::create([
        'id' => 'relationships-test',
>>>>>>> c88446c (.)
        'name' => 'Test relazioni',
        'total_jobs' => 3,
        'pending_jobs' => 3,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
        'options' => [],
=======
        'options' => json_encode([]),
>>>>>>> c88446c (.)
    ]);

    // Crea job associati al batch
    $job1 = Job::create([
        'queue' => 'batch',
<<<<<<< HEAD
        'payload' => [
            'displayName' => 'BatchJob1',
            'batch_id' => $batch->id,
        ],
=======
        'payload' => json_encode([
            'displayName' => 'BatchJob1',
            'batch_id' => $batch->id,
        ]),
>>>>>>> c88446c (.)
        'attempts' => 0,
        'available_at' => now()->timestamp,
    ]);

    $job2 = Job::create([
        'queue' => 'batch',
<<<<<<< HEAD
        'payload' => [
            'displayName' => 'BatchJob2',
            'batch_id' => $batch->id,
        ],
=======
        'payload' => json_encode([
            'displayName' => 'BatchJob2',
            'batch_id' => $batch->id,
        ]),
>>>>>>> c88446c (.)
        'attempts' => 0,
        'available_at' => now()->timestamp,
    ]);

    // Verifica che i job siano associati al batch
<<<<<<< HEAD
    Assert::assertSame($batch->id, $job1->payload['batch_id'] ?? null);
    Assert::assertSame($batch->id, $job2->payload['batch_id'] ?? null);
});

it('can manage batch cleanup and maintenance', function (): void {
        /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('cleanup'),
=======
    expect($job1->payload)->toContain($batch->id);
    expect($job2->payload)->toContain($batch->id);
});

it('can manage batch cleanup and maintenance', function (): void {
    $batch = JobBatch::create([
        'id' => 'cleanup-test',
>>>>>>> c88446c (.)
        'name' => 'Test pulizia',
        'total_jobs' => 10,
        'pending_jobs' => 0,
        'failed_jobs' => 2,
        'failed_job_ids' => json_encode(['job-1', 'job-2']),
<<<<<<< HEAD
        'options' => [],
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
=======
        'options' => json_encode([]),
        'finished_at' => now()->subDays(7),
    ]);

    expect($batch->finished())->toBeTrue();
    expect($batch->finished_at < now()->subDays(5))->toBeTrue();

    // Verifica che il batch sia candidato per la pulizia
    expect($batch->finished_at < now()->subDays(5))->toBeTrue();
});

it('can handle batch retry logic', function (): void {
    $batch = JobBatch::create([
        'id' => 'retry-test',
>>>>>>> c88446c (.)
        'name' => 'Test retry',
        'total_jobs' => 5,
        'pending_jobs' => 0,
        'failed_jobs' => 3,
        'failed_job_ids' => json_encode(['job-1', 'job-2', 'job-3']),
<<<<<<< HEAD
        'options' => [
            'retry_failed_jobs' => true,
            'max_retries' => 2,
        ],
        'finished_at' => now(),
    ]);

    Assert::assertSame(3, $batch->failed_jobs);
    $retryOptions = $batch->options?->all() ?? [];
    Assert::assertSame(true, $retryOptions['retry_failed_jobs'] ?? null);
=======
        'options' => json_encode([
            'retry_failed_jobs' => true,
            'max_retries' => 2,
        ]),
        'finished_at' => now(),
    ]);

    expect($batch->failed_jobs)->toBe(3);
    expect(json_decode($batch->options, true)['retry_failed_jobs'])->toBeTrue();

>>>>>>> c88446c (.)
    // Simula retry dei job falliti
    $batch->update([
        'pending_jobs' => 3,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
        'finished_at' => null,
    ]);

<<<<<<< HEAD
    Assert::assertSame(0, $batch->failed_jobs);
    Assert::assertSame(3, $batch->pending_jobs);
    Assert::assertFalse($batch->finished());
});

it('can handle batch notification settings', function (): void {
        /** @var TestCase $this */
    $batch = JobBatch::create([
        'id' => uniqueJobBatchId('notification'),
=======
    expect($batch->failed_jobs)->toBe(0);
    expect($batch->pending_jobs)->toBe(3);
    expect($batch->finished())->toBeFalse();
});

it('can handle batch notification settings', function (): void {
    $batch = JobBatch::create([
        'id' => 'notification-test',
>>>>>>> c88446c (.)
        'name' => 'Test notifiche',
        'total_jobs' => 10,
        'pending_jobs' => 10,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
        'options' => [
=======
        'options' => json_encode([
>>>>>>> c88446c (.)
            'notify_on_completion' => true,
            'notify_on_failure' => true,
            'notification_email' => 'admin@example.com',
            'notification_slack' => 'https://hooks.slack.com/...',
<<<<<<< HEAD
        ],
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
=======
        ]),
    ]);

    $options = json_decode($batch->options, true);
    expect($options['notify_on_completion'])->toBeTrue();
    expect($options['notify_on_failure'])->toBeTrue();
    expect($options['notification_email'])->toBe('admin@example.com');
    expect($options['notification_slack'])->toBe('https://hooks.slack.com/...');
});

it('can handle batch bulk operations', function (): void {
    // Crea un batch di batch per testare operazioni bulk
    $batchList = [];
    $statuses = ['active', 'completed', 'failed'];

    for ($i = 1; $i <= 3; $i++) {
        $batchList[] = JobBatch::create([
            'id' => "bulk-batch-{$i}",
>>>>>>> c88446c (.)
            'name' => "Batch bulk {$i}",
            'total_jobs' => $i * 10,
            'pending_jobs' => $i * 5,
            'failed_jobs' => $i,
            'failed_job_ids' => json_encode(["failed-job-{$i}"]),
<<<<<<< HEAD
            'options' => ['priority' => $priorities[$i - 1]],
        ]);
    }

    Assert::assertCount(3, $batchList);
    foreach ($batchList as $index => $batch) {
        Assert::assertNotEmpty($batch->id);
        Assert::assertSame(($index + 1) * 10, $batch->total_jobs);
        $batchOptions = $batch->options?->all() ?? [];
        Assert::assertSame($priorities[$index], $batchOptions['priority'] ?? null);
=======
            'options' => json_encode(['priority' => $statuses[$i - 1]]),
            'status' => $statuses[$i - 1],
        ]);
    }

    expect($batchList)->toHaveCount(3);

    foreach ($batchList as $index => $batch) {
        expect($batch->id)->toBe('bulk-batch-'.($index + 1));
        expect($batch->total_jobs)->toBe(($index + 1) * 10);
        expect($batch->status)->toBe($statuses[$index]);
>>>>>>> c88446c (.)
    }
});

it('can validate batch integrity', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
    // Test con batch valido
    $validBatch = JobBatch::create([
        'id' => uniqueJobBatchId('valid'),
=======
    // Test con batch valido
    $validBatch = JobBatch::create([
        'id' => 'valid-batch',
>>>>>>> c88446c (.)
        'name' => 'Batch valido',
        'total_jobs' => 10,
        'pending_jobs' => 10,
        'failed_jobs' => 0,
        'failed_job_ids' => json_encode([]),
<<<<<<< HEAD
        'options' => [],
    ]);

    Assert::assertNotNull($validBatch->id);
    // Verifica che i contatori siano coerenti

    Assert::assertLessThanOrEqual($validBatch->total_jobs, $validBatch->pending_jobs + $validBatch->failed_jobs);
=======
        'options' => json_encode([]),
    ]);

    expect($validBatch->id)->not->toBeNull();

    // Verifica che i contatori siano coerenti
    expect($validBatch->failed_jobs)->toBeGreaterThanOrEqual(0);
    expect($validBatch->pending_jobs + $validBatch->failed_jobs)->toBeLessThanOrEqual($validBatch->total_jobs);
>>>>>>> c88446c (.)
});
