<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Pages;

use Modules\Job\Filament\Widgets\ScheduleStatusWidget;
use Modules\Xot\Filament\Pages\XotBasePage;

class JobMonitor extends XotBasePage
{
    protected string $view = 'job::filament.pages.job-monitor';

    /**
     * @return array<class-string>
     */
    public function getHeaderWidgets(): array
    {
        return [
            ScheduleStatusWidget::class,
        ];
    }
}
