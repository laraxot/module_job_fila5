<?php

declare(strict_types=1);

namespace Modules\Job\Actions\Schedule;

use Illuminate\Support\Facades\Cache;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class ClearScheduleCacheAction
{
    use QueueableAction;

    /**
     * Clear the schedules cache.
     */
    public function execute(): void
    {
        Assert::string($store = config('job::cache.store'), '['.class_basename($this).']');
        Assert::string($key = config('job::cache.key'), '['.class_basename($this).']');

        Cache::store($store)->forget($key);
    }
}
