<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\ParameterFactory;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Job\Models\Parameter.
 *
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read \Modules\Job\Models\Frequency|null $task
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Job\Database\Factories\ParameterFactory factory($count = null, $state = [])
 * @method static Builder<static>|Parameter newModelQuery()
 * @method static Builder<static>|Parameter newQuery()
 * @method static Builder<static>|Parameter query()
 * @mixin \Eloquent
 */
class Parameter extends BaseModel
{
    // protected $table = 'frequency_parameters';

    protected $fillable = [
        'id',
        'name',
        'value',
    ];

    /**
     * @return BelongsTo<Frequency, $this>
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Frequency::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'id' => 'integer',
            'frequency_id' => 'integer',
            'name' => 'string',
            'value' => 'string',
            'created_by' => 'string',
            'updated_by' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ]);
    }
}
