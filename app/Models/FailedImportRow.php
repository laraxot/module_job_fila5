<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\FailedImportRowFactory;
use Modules\Xot\Contracts\ProfileContract;
use Override;

/**
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Job\Database\Factories\FailedImportRowFactory factory($count = null, $state = [])
 * @method static Builder<static>|FailedImportRow newModelQuery()
 * @method static Builder<static>|FailedImportRow newQuery()
 * @method static Builder<static>|FailedImportRow query()
 * @mixin \Eloquent
 */
class FailedImportRow extends BaseModel
{
    protected $fillable = [
        'id',
        'data',
        'import_id',
        'validation_error',
    ];

    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'data' => 'json',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'payload' => 'array',
            'completed_at' => 'datetime',
            // 'updated_at' => 'datetime:Y-m-d H:00',
            // 'created_at' => 'datetime:Y-m-d',
            // 'created_at' => 'datetime:d/m/Y H:i'
        ];
    }
}
