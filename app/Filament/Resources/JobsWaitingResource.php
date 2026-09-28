<?php

/**
 * @see https://github.com/mooxphp/jobs/blob/main/src/resources/JobsWaitingResource.php
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

<<<<<<< HEAD
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\Job\Filament\Resources\JobsWaitingResource\Widgets\JobsWaitingOverview;
use Modules\Job\Models\JobsWaiting;
=======
use Modules\Job\Filament\Resources\JobsWaitingResource\Widgets\JobsWaitingOverview;
use Modules\Job\Models\Job;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class JobsWaitingResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static ?string $model = JobsWaiting::class;
=======
    protected static ?string $model = Job::class;
>>>>>>> laraxot/dev

    protected static bool $shouldRegisterNavigation = true;

    #[Override]
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
    public static function getWidgets(): array
    {
        return [
            JobsWaitingOverview::class,
        ];
    }
}
