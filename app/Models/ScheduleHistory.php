<?php

declare(strict_types=1);

/**
 * @see HusamTariq\FilamentDatabaseSchedule
 */

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\ScheduleHistoryFactory;
use Modules\Xot\Contracts\ProfileContract;
use Override;

/**
 * Modules\Job\Models\ScheduleHistory.
 *
 * @property-read \Modules\Job\Models\Schedule|null $command
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Job\Database\Factories\ScheduleHistoryFactory factory($count = null, $state = [])
 * @method static Builder<static>|ScheduleHistory newModelQuery()
 * @method static Builder<static>|ScheduleHistory newQuery()
 * @method static Builder<static>|ScheduleHistory query()
 * @mixin \Eloquent
 */
class ScheduleHistory extends BaseModel
{
    /*
     * The database table used by the model.
     *
     * @var string
     */
    // protected $table;

    protected $fillable = [
        'command',
        'params',
        'output',
        'options',
    ];

    /*
     * Creates a new instance of the model.
     *
     * @param array $attributes
     * @return void
     */
    /*
     * public function __construct(array $attributes = [])
     * {
     * parent::__construct($attributes);
     *
     * $this->table = Config::get('filament-database-schedule.table.schedule_histories', 'schedule_histories');
     * }
     *
     */

    /**
     * @return BelongsTo<Schedule, $this>
     */
    public function command(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
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
            'params' => 'array',
            'options' => 'array',
        ];
    }
}
