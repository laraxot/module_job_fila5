<?php

declare(strict_types=1);

namespace Modules\Job\Models\Traits;

use Exception;
use Illuminate\Console\Scheduling\ManagesFrequencies;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use Modules\Job\Database\Factories\ScheduleFactory;
use Modules\Job\Enums\Status;
use Modules\Xot\Contracts\ProfileContract;
use Override;
use Modules\Job\Models\ScheduleHistory;

trait ScheduleRelations
{
    /**
     * @phpstan-return HasMany<ScheduleHistory, $this>
     */
    function histories(): HasMany
        {
            return $this->hasMany(ScheduleHistory::class, 'schedule_id', 'id');
        }

}
