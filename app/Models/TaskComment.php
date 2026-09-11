<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
=======
use Modules\Job\Database\Factories\TaskCommentFactory;
use Modules\User\Models\User;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> laraxot/dev

/**
 * Class TaskComment.
 *
<<<<<<< HEAD
 * @property-read User|null $user
 *
 * @method static Builder<static>|TaskComment newModelQuery()
 * @method static Builder<static>|TaskComment newQuery()
 * @method static Builder<static>|TaskComment query()
=======
 * @property ProfileContract|null $creator
 * @property Task|null $task
 * @property ProfileContract|null $updater
 * @property User|null $user
 *
 * @method static Builder<static>|TaskComment newModelQuery()
 * @method static Builder<static>|TaskComment newQuery()
 * @method static Builder<static>|TaskComment onlyTrashed()
 * @method static Builder<static>|TaskComment query()
 * @method static Builder<static>|TaskComment withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|TaskComment withoutTrashed()
 *
 * @property-read ProfileContract|null $deleter
 *
 * @method static TaskCommentFactory factory($count = null, $state = [])
>>>>>>> laraxot/dev
 *
 * @mixin \Eloquent
 */
class TaskComment extends BaseModel
{
    protected $table = 'task_comments';

    protected $fillable = [
        'task_id',
        'user_id',
        'comment',
    ];

    /**
     * @return BelongsTo<Task, $this>
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
<<<<<<< HEAD
        /** @var class-string<User> $userClass */
        $userClass = XotData::make()->getUserClass();

        return $this->belongsTo($userClass);
=======
        return $this->belongsTo(User::class);
>>>>>>> laraxot/dev
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
}
