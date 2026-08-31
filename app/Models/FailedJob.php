<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Job\Database\Factories\FailedJobFactory;
use Modules\Xot\Contracts\ProfileContract;
use Override;

/**
 * Modules\Job\Models\FailedJob.
 *
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Job\Database\Factories\FailedJobFactory factory($count = null, $state = [])
 * @method static Builder<static>|FailedJob newModelQuery()
 * @method static Builder<static>|FailedJob newQuery()
 * @method static Builder<static>|FailedJob query()
 * @mixin \Eloquent
 */
class FailedJob extends BaseModel
{
    protected $fillable = [
        'id',
        'uuid',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at',
    ];

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
            'payload' => 'array',
        ];
    }
}
