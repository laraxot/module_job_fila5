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
>>>>>>> c88446c (.)

describe('Job Business Logic', function () {
    it('can create job with basic information', function () {
        $jobData = [
            'queue' => 'default',
<<<<<<< HEAD
            'payload' => [
=======
            'payload' => json_encode([
>>>>>>> c88446c (.)
                'displayName' => 'App\Jobs\ProcessUserJob',
                'job' => 'Illuminate\Queue\CallQueuedHandler@call',
                'maxTries' => 3,
                'maxExceptions' => 0,
                'timeout' => 120,
                'data' => ['user_id' => 123],
<<<<<<< HEAD
            ],
=======
            ]),
>>>>>>> c88446c (.)
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ];

        $job = Job::create($jobData);

<<<<<<< HEAD
        Assert::assertInstanceOf(Job::class, $job);

        Assert::assertSame('default', $job->queue);

        Assert::assertSame(0, $job->attempts);

        Assert::assertNull($job->reserved_at);
=======
        expect($job)
            ->toBeInstanceOf(Job::class)
            ->and($job->queue)
            ->toBe('default')
            ->and($job->attempts)
            ->toBe(0)
            ->and($job->reserved_at)
            ->toBeNull();
>>>>>>> c88446c (.)
    });
});
