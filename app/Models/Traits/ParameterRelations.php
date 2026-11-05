<?php

declare(strict_types=1);

namespace Modules\Job\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\ParameterFactory;
use Modules\Job\Models\Frequency;
use Modules\Xot\Contracts\ProfileContract;

trait ParameterRelations
{
    /**
     * @phpstan-return BelongsTo<Frequency, $this>
     */
    function task(): BelongsTo
        {
            return $this->belongsTo(Frequency::class);
        }

}
