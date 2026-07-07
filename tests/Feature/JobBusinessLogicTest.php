<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Job\Tests\TestCase::class);

use Modules\Job\Models\Job;

use function Safe\json_encode;
=======
use Modules\Job\Models\Job;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
uses(TestCase::class);
>>>>>>> origin/dev

describe('Job Business Logic', function () {
    it('can instantiate job with basic attributes', function () {
        $job = new Job([
            'queue' => 'default',
<<<<<<< HEAD
            'payload' => json_encode(['displayName' => 'App\Jobs\ProcessUserJob']),
=======
            'payload' => ['displayName' => 'App\Jobs\ProcessUserJob'],
>>>>>>> origin/dev
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job)
            ->toBeInstanceOf(Job::class)
            ->and($job->queue)->toBe('default')
            ->and($job->attempts)->toBe(0);
=======
        Assert::assertSame('default', $job->queue);
        Assert::assertSame(0, $job->attempts);
        Assert::assertInstanceOf(Job::class, $job);
>>>>>>> origin/dev
    });

    it('returns waiting status when not reserved', function () {
        $job = new Job([
            'queue' => 'high',
<<<<<<< HEAD
            'payload' => json_encode(['displayName' => 'TestJob']),
=======
            'payload' => ['displayName' => 'TestJob'],
>>>>>>> origin/dev
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->status)->toBe('waiting');
=======
        Assert::assertSame('waiting', $job->status);
>>>>>>> origin/dev
    });

    it('returns running status when reserved', function () {
        $job = new Job([
            'queue' => 'high',
<<<<<<< HEAD
            'payload' => json_encode(['displayName' => 'TestJob']),
=======
            'payload' => ['displayName' => 'TestJob'],
>>>>>>> origin/dev
            'attempts' => 1,
            'reserved_at' => now()->timestamp,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->status)->toBe('running');
=======
        Assert::assertSame('running', $job->status);
>>>>>>> origin/dev
    });

    it('extracts display name from payload', function () {
        $job = new Job([
            'queue' => 'notifications',
<<<<<<< HEAD
            'payload' => json_encode([
                'displayName' => 'App\Jobs\SendNotificationJob',
                'job' => 'Illuminate\Queue\CallQueuedHandler@call',
            ]),
=======
            'payload' => [
                'displayName' => 'App\Jobs\SendNotificationJob',
                'job' => 'Illuminate\Queue\CallQueuedHandler@call',
            ],
>>>>>>> origin/dev
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->display_name)->toBe('App\Jobs\SendNotificationJob');
=======
        Assert::assertSame('App\Jobs\SendNotificationJob', $job->display_name);
>>>>>>> origin/dev
    });

    it('handles complex payload structures', function () {
        $complexPayload = [
            'displayName' => 'App\Jobs\ComplexProcessingJob',
            'job' => 'Illuminate\Queue\CallQueuedHandler@call',
            'maxTries' => 5,
            'data' => [
                'user_id' => 789,
                'options' => ['priority' => 'high'],
            ],
        ];

        $job = new Job([
            'queue' => 'processing',
<<<<<<< HEAD
            'payload' => json_encode($complexPayload),
=======
            'payload' => $complexPayload,
>>>>>>> origin/dev
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->display_name)->toBe('App\Jobs\ComplexProcessingJob')
            ->and($job->queue)->toBe('processing');
=======
        Assert::assertSame('processing', $job->queue);
        Assert::assertSame('App\Jobs\ComplexProcessingJob', $job->display_name);
>>>>>>> origin/dev
    });

    it('handles job with future available_at', function () {
        $futureTime = now()->addHours(2);

        $job = new Job([
            'queue' => 'scheduled',
<<<<<<< HEAD
            'payload' => json_encode(['displayName' => 'ScheduledJob']),
=======
            'payload' => ['displayName' => 'ScheduledJob'],
>>>>>>> origin/dev
            'attempts' => 0,
            'available_at' => $futureTime->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->available_at)->toBeGreaterThan(now()->timestamp)
            ->and($job->status)->toBe('waiting');
    });

    it('handles different queue names', function () {
        $highPriorityJob = new Job(['queue' => 'high', 'payload' => '{}', 'attempts' => 0, 'available_at' => now()->timestamp]);
        $lowPriorityJob = new Job(['queue' => 'low', 'payload' => '{}', 'attempts' => 0, 'available_at' => now()->timestamp]);
        $defaultJob = new Job(['queue' => 'default', 'payload' => '{}', 'attempts' => 0, 'available_at' => now()->timestamp]);

        expect($highPriorityJob->queue)->toBe('high')
            ->and($lowPriorityJob->queue)->toBe('low')
            ->and($defaultJob->queue)->toBe('default');
=======
        Assert::assertSame('waiting', $job->status);
        Assert::assertGreaterThan(now()->timestamp, $job->available_at);
    });

    it('handles different queue names', function () {
        $highPriorityJob = new Job(['queue' => 'high', 'payload' => [], 'attempts' => 0, 'available_at' => now()->timestamp]);
        $lowPriorityJob = new Job(['queue' => 'low', 'payload' => [], 'attempts' => 0, 'available_at' => now()->timestamp]);
        $defaultJob = new Job(['queue' => 'default', 'payload' => [], 'attempts' => 0, 'available_at' => now()->timestamp]);

        Assert::assertSame('high', $highPriorityJob->queue);
        Assert::assertSame('low', $lowPriorityJob->queue);
        Assert::assertSame('default', $defaultJob->queue);
>>>>>>> origin/dev
    });

    it('returns null for invalid payload', function () {
        $job = new Job([
            'queue' => 'default',
            'payload' => 'invalid-json',
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->display_name)->toBeNull();
=======
        Assert::assertNull($job->display_name);
>>>>>>> origin/dev
    });

    it('model has correct fillable attributes', function () {
        $job = new Job;
        $fillable = $job->getFillable();

<<<<<<< HEAD
        expect($fillable)->toContain('queue')
            ->and($fillable)->toContain('payload')
            ->and($fillable)->toContain('attempts')
            ->and($fillable)->toContain('available_at');
=======
        Assert::assertContains('queue', $fillable);
        Assert::assertContains('payload', $fillable);
        Assert::assertContains('attempts', $fillable);
        Assert::assertContains('available_at', $fillable);
>>>>>>> origin/dev
    });
});
