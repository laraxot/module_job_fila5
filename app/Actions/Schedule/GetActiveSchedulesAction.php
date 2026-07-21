<?php

declare(strict_types=1);

namespace Modules\Job\Actions\Schedule;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Modules\Job\Models\Schedule;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetActiveSchedulesAction
{
    use QueueableAction;

    /**
     * Get active schedules with caching support.
     *
     * @return Collection<int, Schedule>
     */
    public function execute(): Collection
    {
        if (! config('job::cache.enabled')) {
            return $this->getSchedules();
        }

        return $this->getFromCache();
    }

    /**
     * Get active schedules directly from the database.
     *
     * @return Collection<int, Schedule>
     */
    private function getSchedules(): Collection
    {
        Assert::string($modelClass = config('job::model'), '['.class_basename($this).']');

        $model = app($modelClass);
        Assert::isInstanceOf($model, Schedule::class, '['.class_basename($this).']');

        return $model->active()->get();
    }

    /**
     * Get active schedules from cache with fallback to database.
     *
     * @return Collection<int, Schedule>
     */
    private function getFromCache(): Collection
    {
        Assert::string($store = config('job::cache.store'), '['.class_basename($this).']');
        Assert::string($key = config('job::cache.key'), '['.class_basename($this).']');

        $result = Cache::store($store)->rememberForever($key, fn (): Collection => $this->getSchedules());
        Assert::isInstanceOf($result, Collection::class);

        /** @var Collection<int, Schedule> $result */
        return $result;
    }
}
