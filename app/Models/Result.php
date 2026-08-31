<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Xot\Contracts\ProfileContract;
use Override;

/**
 * Modules\Job\Models\Result.
 *
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read \Modules\Job\Models\Task|null $task
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Job\Database\Factories\ResultFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result query()
 * @mixin \Eloquent
 */
class Result extends BaseModel
{
    protected $fillable = [
        'duration',
        'result',
        'task_id',
    ];

    /**
     * @return BelongsTo<Task, $this>
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function getLastRun(): Builder
    {
        return $this->select('ran_at')
            // ->whereColumn('task_id', TOTEM_TABLE_PREFIX.'tasks.id')
            ->whereColumn('task_id', 'tasks.id')
            ->latest()
            ->limit(1)
            ->getQuery();
    }

    public function getAverageRunTime(): Builder
    {
        return $this->select(DB::raw('avg(duration)'))
            // ->whereColumn('task_id', TOTEM_TABLE_PREFIX.'tasks.id')
            ->whereColumn('task_id', 'tasks.id')
            ->getQuery();
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'ran_at' => 'datetime',
        ];
    }
}
