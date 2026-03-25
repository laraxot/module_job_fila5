<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\Job\Models\Job;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
uses(TestCase::class);
=======
uses(\Modules\Job\Tests\TestCase::class);

use Modules\Job\Models\Job;

use function Safe\json_encode;
>>>>>>> c88446c (.)

describe('Job Business Logic', function () {
    it('can instantiate job with basic attributes', function () {
        $job = new Job([
            'queue' => 'default',
<<<<<<< HEAD
            'payload' => ['displayName' => 'App\Jobs\ProcessUserJob'],
=======
            'payload' => json_encode(['displayName' => 'App\Jobs\ProcessUserJob']),
>>>>>>> c88446c (.)
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        Assert::assertSame('default', $job->queue);
        Assert::assertSame(0, $job->attempts);
        Assert::assertInstanceOf(Job::class, $job);
=======
        expect($job)
            ->toBeInstanceOf(Job::class)
            ->and($job->queue)->toBe('default')
            ->and($job->attempts)->toBe(0);
>>>>>>> c88446c (.)
    });

    it('returns waiting status when not reserved', function () {
        $job = new Job([
            'queue' => 'high',
<<<<<<< HEAD
            'payload' => ['displayName' => 'TestJob'],
=======
            'payload' => json_encode(['displayName' => 'TestJob']),
>>>>>>> c88446c (.)
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        Assert::assertSame('waiting', $job->status);
=======
        expect($job->status)->toBe('waiting');
>>>>>>> c88446c (.)
    });

    it('returns running status when reserved', function () {
        $job = new Job([
            'queue' => 'high',
<<<<<<< HEAD
            'payload' => ['displayName' => 'TestJob'],
=======
            'payload' => json_encode(['displayName' => 'TestJob']),
>>>>>>> c88446c (.)
            'attempts' => 1,
            'reserved_at' => now()->timestamp,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        Assert::assertSame('running', $job->status);
=======
        expect($job->status)->toBe('running');
>>>>>>> c88446c (.)
    });

    it('extracts display name from payload', function () {
        $job = new Job([
            'queue' => 'notifications',
<<<<<<< HEAD
            'payload' => [
                'displayName' => 'App\Jobs\SendNotificationJob',
                'job' => 'Illuminate\Queue\CallQueuedHandler@call',
            ],
=======
            'payload' => json_encode([
                'displayName' => 'App\Jobs\SendNotificationJob',
                'job' => 'Illuminate\Queue\CallQueuedHandler@call',
            ]),
>>>>>>> c88446c (.)
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        Assert::assertSame('App\Jobs\SendNotificationJob', $job->display_name);
=======
        expect($job->display_name)->toBe('App\Jobs\SendNotificationJob');
>>>>>>> c88446c (.)
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
            'payload' => $complexPayload,
=======
            'payload' => json_encode($complexPayload),
>>>>>>> c88446c (.)
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        Assert::assertSame('processing', $job->queue);
        Assert::assertSame('App\Jobs\ComplexProcessingJob', $job->display_name);
=======
        expect($job->display_name)->toBe('App\Jobs\ComplexProcessingJob')
            ->and($job->queue)->toBe('processing');
>>>>>>> c88446c (.)
    });

    it('handles job with future available_at', function () {
        $futureTime = now()->addHours(2);

        $job = new Job([
            'queue' => 'scheduled',
<<<<<<< HEAD
            'payload' => ['displayName' => 'ScheduledJob'],
=======
            'payload' => json_encode(['displayName' => 'ScheduledJob']),
>>>>>>> c88446c (.)
            'attempts' => 0,
            'available_at' => $futureTime->timestamp,
        ]);

<<<<<<< HEAD
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
=======
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
>>>>>>> c88446c (.)
    });

    it('returns null for invalid payload', function () {
        $job = new Job([
            'queue' => 'default',
            'payload' => 'invalid-json',
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        Assert::assertNull($job->display_name);
=======
        expect($job->display_name)->toBeNull();
>>>>>>> c88446c (.)
    });

    it('model has correct fillable attributes', function () {
        $job = new Job;
        $fillable = $job->getFillable();

<<<<<<< HEAD
        Assert::assertContains('queue', $fillable);
        Assert::assertContains('payload', $fillable);
        Assert::assertContains('attempts', $fillable);
        Assert::assertContains('available_at', $fillable);
=======
        expect($fillable)->toContain('queue')
            ->and($fillable)->toContain('payload')
            ->and($fillable)->toContain('attempts')
            ->and($fillable)->toContain('available_at');
>>>>>>> c88446c (.)
    });
});
