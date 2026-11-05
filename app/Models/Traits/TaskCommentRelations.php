<?php

declare(strict_types=1);

namespace Modules\Job\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Job\Database\Factories\TaskCommentFactory;
use Modules\User\Models\User;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Job\Models\Task;

trait TaskCommentRelations
{
    function task(): BelongsTo
        {
            return $this->belongsTo(Task::class);
        }

    function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

}
