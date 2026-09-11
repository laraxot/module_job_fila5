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
<<<<<<< HEAD
=======
use Modules\Job\Database\Factories\JobBatchFactory;
>>>>>>> laraxot/dev
use Modules\Xot\Contracts\ProfileContract;
use Override;

/**
 * Modules\Job\Models\JobBatch.
 *
<<<<<<< HEAD
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 *
 * @method static Builder<static>|JobBatch newModelQuery()
 * @method static Builder<static>|JobBatch newQuery()
 * @method static Builder<static>|JobBatch query()
 *
=======
>>>>>>> laraxot/dev
 * @property string $id
 * @property string $name
 * @property int $total_jobs
 * @property int $pending_jobs
 * @property int $failed_jobs
 * @property string $failed_job_ids
 * @property Collection<array-key, mixed>|null $options
 * @property Carbon|null $cancelled_at
 * @property Carbon $created_at
 * @property Carbon|null $finished_at
<<<<<<< HEAD
 *
=======
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 *
 * @method static JobBatchFactory factory($count = null, $state = [])
 * @method static Builder<static>|JobBatch newModelQuery()
 * @method static Builder<static>|JobBatch newQuery()
 * @method static Builder<static>|JobBatch query()
>>>>>>> laraxot/dev
 * @method static Builder<static>|JobBatch whereCancelledAt($value)
 * @method static Builder<static>|JobBatch whereCreatedAt($value)
 * @method static Builder<static>|JobBatch whereFailedJobIds($value)
 * @method static Builder<static>|JobBatch whereFailedJobs($value)
 * @method static Builder<static>|JobBatch whereFinishedAt($value)
 * @method static Builder<static>|JobBatch whereId($value)
 * @method static Builder<static>|JobBatch whereName($value)
 * @method static Builder<static>|JobBatch whereOptions($value)
 * @method static Builder<static>|JobBatch wherePendingJobs($value)
 * @method static Builder<static>|JobBatch whereTotalJobs($value)
 *
<<<<<<< HEAD
=======
 * @property-read ProfileContract|null $deleter
 *
>>>>>>> laraxot/dev
 * @mixin \Eloquent
 */
class JobBatch extends BaseModel
{
<<<<<<< HEAD
    public const ?string UPDATED_AT = null;
=======
    public const UPDATED_AT = null;
>>>>>>> laraxot/dev

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
<<<<<<< HEAD
     */
    public function processedJobs(): int
    {
        return (int) $this->total_jobs - (int) $this->pending_jobs;
=======
     *
     * @return int
     */
    public function processedJobs(): int|float
    {
        return $this->total_jobs - $this->pending_jobs;
>>>>>>> laraxot/dev
    }

    /**
     * Get the percentage of jobs that have been processed (between 0-100).
     */
    public function progress(): int
    {
<<<<<<< HEAD
        $total = (int) $this->total_jobs;
        if ($total <= 0) {
            return 0;
        }

        return (int) round(($this->processedJobs() / $total) * 100);
=======
        $totalJobs = $this->total_jobs;
        $progress = $totalJobs > 0 ? round($this->processedJobs() / $totalJobs * 100) : 0;

        return (int) $progress;
>>>>>>> laraxot/dev
    }

    /**
     * Determine if the batch has pending jobs.
     */
    public function hasPendingJobs(): bool
    {
<<<<<<< HEAD
        return ((int) $this->pending_jobs) > 0;
=======
        return $this->pending_jobs > 0;
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
        return ((int) $this->failed_jobs) > 0;
=======
        return $this->failed_jobs > 0;
>>>>>>> laraxot/dev
    }

    /**
     * Determine if all jobs failed.
     */
    public function failed(): bool
    {
<<<<<<< HEAD
        return ((int) $this->failed_jobs) === ((int) $this->total_jobs);
=======
        return $this->failed_jobs === $this->total_jobs;
>>>>>>> laraxot/dev
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
