<?php

/**
 * ---.
 *
 * @see https://philo.dev/laravel-batches-and-real-time-progress-with-livewire/
 * @see https://philo.dev/laravel-batches-and-real-time-progress-with-livewire/
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\Job\Database\Factories\JobBatchFactory;
use Modules\Xot\Contracts\ProfileContract;
use Override;

/**
 * Modules\Job\Models\JobBatch.
 *
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Job\Database\Factories\JobBatchFactory factory($count = null, $state = [])
 * @method static Builder<static>|JobBatch newModelQuery()
 * @method static Builder<static>|JobBatch newQuery()
 * @method static Builder<static>|JobBatch query()
 * @mixin \Eloquent
 */
class JobBatch extends BaseModel
{
    public const UPDATED_AT = null;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'total_jobs',
        'pending_jobs',
        'failed_jobs',
        'failed_job_ids',
        'options',
        'cancelled_at',
        'created_at',
        'finished_at',
    ];

    /**
     * Get the total number of jobs that have been processed by the batch thus far.
     *
     * @return int
     */
    public function processedJobs(): int|float
    {
        $totalJobs = (int) ($this->attributes['total_jobs'] ?? 0);
        $pendingJobs = (int) ($this->attributes['pending_jobs'] ?? 0);

        return $totalJobs - $pendingJobs;
    }

    /**
     * Get the percentage of jobs that have been processed (between 0-100).
     */
    public function progress(): int
    {
        $totalJobs = (int) ($this->attributes['total_jobs'] ?? 0);
        $progress = $totalJobs > 0 ? round($this->processedJobs() / $totalJobs * 100) : 0;

        return (int) $progress;
    }

    /**
     * Determine if the batch has pending jobs.
     */
    public function hasPendingJobs(): bool
    {
        $pendingJobs = (int) ($this->attributes['pending_jobs'] ?? 0);

        return $pendingJobs > 0;
    }

    /**
     * Determine if the batch has finished executing.
     */
    public function finished(): bool
    {
        return $this->finished_at !== null;
    }

    /**
     * Determine if the batch has job failures.
     */
    public function hasFailures(): bool
    {
        $failedJobs = (int) ($this->attributes['failed_jobs'] ?? 0);

        return $failedJobs > 0;
    }

    /**
     * Determine if all jobs failed.
     */
    public function failed(): bool
    {
        $failedJobs = (int) ($this->attributes['failed_jobs'] ?? 0);
        $totalJobs = (int) ($this->attributes['total_jobs'] ?? 0);

        return $failedJobs === $totalJobs;
    }

    /**
     * Determine if the batch has been canceled.
     */
    public function cancelled(): bool
    {
        return $this->cancelled_at !== null;
    }

    /**  @return array<string, string>  */
    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'name' => 'string',
            'total_jobs' => 'integer',
            'pending_jobs' => 'integer',
            'failed_jobs' => 'integer',
            'failed_job_ids' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'options' => 'collection',
            'cancelled_at' => 'datetime',
            'finished_at' => 'datetime',
        ];
    }
}
