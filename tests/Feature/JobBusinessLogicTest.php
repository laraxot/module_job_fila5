<?php

declare(strict_types=1);

use Modules\Job\Models\Job;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Job Business Logic', function () {
    it('can instantiate job with basic attributes', function () {
        $job = new Job([
            'queue' => 'default',
<<<<<<< HEAD
           'payload' => ['displayName' => 'App\Jobs\ProcessUserJob'],
=======
            'payload' => ['displayName' => 'App\Jobs\ProcessUserJob'],
>>>>>>> laraxot/dev
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
       Assert::assertSame('default', $job->queue);
=======
        Assert::assertSame('default', $job->queue);
>>>>>>> laraxot/dev
        Assert::assertSame(0, $job->attempts);
        Assert::assertInstanceOf(Job::class, $job);
    });

    it('returns waiting status when not reserved', function () {
        $job = new Job([
            'queue' => 'high',
<<<<<<< HEAD
           'payload' => ['displayName' => 'TestJob'],
=======
            'payload' => ['displayName' => 'TestJob'],
>>>>>>> laraxot/dev
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
       Assert::assertSame('waiting', $job->status);
=======
        Assert::assertSame('waiting', $job->status);
>>>>>>> laraxot/dev
    });

    it('returns running status when reserved', function () {
        $job = new Job([
            'queue' => 'high',
<<<<<<< HEAD
           'payload' => ['displayName' => 'TestJob'],
=======
            'payload' => ['displayName' => 'TestJob'],
>>>>>>> laraxot/dev
            'attempts' => 1,
            'reserved_at' => now()->timestamp,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
       Assert::assertSame('running', $job->status);
=======
        Assert::assertSame('running', $job->status);
>>>>>>> laraxot/dev
    });

    it('extracts display name from payload', function () {
        $job = new Job([
            'queue' => 'notifications',
<<<<<<< HEAD
           'payload' => [
=======
            'payload' => [
>>>>>>> laraxot/dev
                'displayName' => 'App\Jobs\SendNotificationJob',
                'job' => 'Illuminate\Queue\CallQueuedHandler@call',
            ],
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
       Assert::assertSame('App\Jobs\SendNotificationJob', $job->display_name);
=======
        Assert::assertSame('App\Jobs\SendNotificationJob', $job->display_name);
>>>>>>> laraxot/dev
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
            'payload' => $complexPayload,
>>>>>>> laraxot/dev
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
       Assert::assertSame('processing', $job->queue);
=======
        Assert::assertSame('processing', $job->queue);
>>>>>>> laraxot/dev
        Assert::assertSame('App\Jobs\ComplexProcessingJob', $job->display_name);
    });

    it('handles job with future available_at', function () {
        $futureTime = now()->addHours(2);

        $job = new Job([
            'queue' => 'scheduled',
<<<<<<< HEAD
           'payload' => ['displayName' => 'ScheduledJob'],
=======
            'payload' => ['displayName' => 'ScheduledJob'],
>>>>>>> laraxot/dev
            'attempts' => 0,
            'available_at' => $futureTime->timestamp,
        ]);

<<<<<<< HEAD
       Assert::assertSame('waiting', $job->status);
=======
        Assert::assertSame('waiting', $job->status);
>>>>>>> laraxot/dev
        Assert::assertGreaterThan(now()->timestamp, $job->available_at);
    });

    it('handles different queue names', function () {
        $highPriorityJob = new Job(['queue' => 'high', 'payload' => [], 'attempts' => 0, 'available_at' => now()->timestamp]);
        $lowPriorityJob = new Job(['queue' => 'low', 'payload' => [], 'attempts' => 0, 'available_at' => now()->timestamp]);
        $defaultJob = new Job(['queue' => 'default', 'payload' => [], 'attempts' => 0, 'available_at' => now()->timestamp]);

        Assert::assertSame('high', $highPriorityJob->queue);
        Assert::assertSame('low', $lowPriorityJob->queue);
        Assert::assertSame('default', $defaultJob->queue);
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
        Assert::assertNull($job->display_name);
>>>>>>> laraxot/dev
    });

    it('model has correct fillable attributes', function () {
        $job = new Job;
        $fillable = $job->getFillable();

<<<<<<< HEAD
       Assert::assertContains('queue', $fillable);
=======
        Assert::assertContains('queue', $fillable);
>>>>>>> laraxot/dev
        Assert::assertContains('payload', $fillable);
        Assert::assertContains('attempts', $fillable);
        Assert::assertContains('available_at', $fillable);
    });
});