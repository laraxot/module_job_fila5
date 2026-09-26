<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
/**
 * ---.
 */

<<<<<<< HEAD
namespace Modules\Job\Filament\Resources\JobManagerResource\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
=======
declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobManagerResource\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;
>>>>>>> laraxot/dev
use Illuminate\Support\Facades\DB;
use Modules\Job\Models\JobManager;
use Modules\Job\Traits\FormatSeconds;
use Modules\Xot\Actions\Cast\SafeEloquentCastAction;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget;

class JobStatsOverview extends XotBaseStatsOverviewWidget
=======
use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget as BaseWidget;

class JobStatsOverview extends BaseWidget
>>>>>>> laraxot/dev
{
    use FormatSeconds;

    protected function getCards(): array
    {
        $aggregationColumns = [
            DB::raw('COUNT(*) as count'),
            DB::raw('SUM(finished_at - started_at) as total_time_elapsed'),
            DB::raw('AVG(finished_at - started_at) as average_time_elapsed'),
        ];

        $aggregatedInfo = JobManager::query()->select($aggregationColumns)->first();
<<<<<<< HEAD

        if ($aggregatedInfo) {
            $averageTime = app(SafeEloquentCastAction::class)
                ->getStringAttribute($aggregatedInfo, 'average_time_elapsed', '0')
                ? ceil(
                    (float) app(SafeEloquentCastAction::class)
                        ->getStringAttribute($aggregatedInfo, 'average_time_elapsed', '0'),
                ).'s'
                : '0';

            $totalTime = app(SafeEloquentCastAction::class)
                ->getStringAttribute($aggregatedInfo, 'total_time_elapsed', '0')
                ? $this->formatSeconds(
                    (int) app(SafeEloquentCastAction::class)
                        ->getStringAttribute($aggregatedInfo, 'total_time_elapsed', '0'),
                )
                : '0';
        } else {
            $averageTime = '0';
            $totalTime = '0';
        }

        return [
            Stat::make(
                (string) __('jobs::translations.total_jobs'),
                $aggregatedInfo
                    ? app(SafeEloquentCastAction::class)->getIntAttribute($aggregatedInfo, 'count', 0)
                    : 0,
            ),
            Stat::make((string) __('jobs::translations.execution_time'), (string) $totalTime),
            Stat::make((string) __('jobs::translations.average_time'), (string) $averageTime),
=======
        $cast = app(SafeEloquentCastAction::class);

        if ($aggregatedInfo instanceof Model) {
            $averageSeconds = (float) $cast->getStringAttribute($aggregatedInfo, 'average_time_elapsed', '0');
            $totalSeconds = (int) $cast->getStringAttribute($aggregatedInfo, 'total_time_elapsed', '0');
            $totalJobs = $cast->getIntAttribute($aggregatedInfo, 'count', 0);
            $averageTime = $averageSeconds > 0.0 ? ceil($averageSeconds).'s' : '0';
            $totalTime = $totalSeconds > 0 ? $this->formatSeconds($totalSeconds) : '0';
        } else {
            $averageTime = '0';
            $totalTime = '0';
            $totalJobs = 0;
        }

        return [
            Stat::make(__('jobs::translations.total_jobs'), $totalJobs),
            Stat::make(__('jobs::translations.execution_time'), $totalTime),
            Stat::make(__('jobs::translations.average_time'), $averageTime),
>>>>>>> laraxot/dev
        ];
    }
}
