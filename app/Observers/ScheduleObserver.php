<?php

declare(strict_types=1);

/**
 * @see HusamTariq\FilamentDatabaseSchedule
 */

namespace Modules\Job\Observers;

<<<<<<< HEAD
use Modules\Job\Actions\ClearScheduleCacheAction;
use Modules\Job\Enums\Status;
use Modules\Job\Models\Schedule;
=======
use Modules\Job\Enums\Status;
use Modules\Job\Models\Schedule;
use Modules\Job\Services\ScheduleService;
>>>>>>> af4545e (.)

class ScheduleObserver
{
    /**
     * Undocumented function.
     */
    public function created(): void
    {
        $this->clearCache();
    }

    /**
     * Undocumented function.
     */
    public function updated(Schedule $_schedule): void
    {
        $this->clearCache();
    }

    /**
     * Undocumented function.
     */
    public function deleted(Schedule $schedule): void
    {
        $schedule->status = Status::Trashed;
        $schedule->saveQuietly();
        $this->clearCache();
    }

    /**
     * Undocumented function.
     */
    public function restored(Schedule $schedule): void
    {
        $schedule->status = Status::Inactive;
        $schedule->saveQuietly();
    }

    /**
     * Undocumented function.
     */
    public function saved(Schedule $_schedule): void
    {
        $this->clearCache();
    }

    /**
     * Undocumented function.
     */
    protected function clearCache(): void
    {
        if (config('job::cache.enabled')) {
<<<<<<< HEAD
            app(ClearScheduleCacheAction::class)->execute();
=======
            $scheduleService = app(ScheduleService::class);
            if ($scheduleService !== null) {
                $scheduleService->clearCache();
            }
>>>>>>> af4545e (.)
        }
    }
}
