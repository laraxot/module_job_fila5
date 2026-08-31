<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Eloquent;
use Filament\Actions\Exports\Models\Export as BaseExport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property-read Model|\Eloquent $user
 * @method static Builder<static>|Export newModelQuery()
 * @method static Builder<static>|Export newQuery()
 * @method static Builder<static>|Export query()
 * @mixin Eloquent
 */
class Export extends BaseExport
{
    protected $connection = 'job';

    protected $fillable = [
        'id',
        'completed_at',
        'file_disk',
        'file_name',
        'exporter',
        'processed_rows',
        'total_rows',
        'successful_rows',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'data' => 'json',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'payload' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'completed_at' => 'datetime',
            // 'updated_at' => 'datetime:Y-m-d H:00',
            // 'created_at' => 'datetime:Y-m-d',
            // 'created_at' => 'datetime:d/m/Y H:i'
        ];
    }
}
