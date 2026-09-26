<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
/**
 * @see https://github.com/mooxphp/jobs/blob/main/src/resources/JobsWaitingResource.php
 */

<<<<<<< HEAD
namespace Modules\Job\Filament\Resources;

use Modules\Job\Filament\Resources\JobsWaitingResource\Widgets\JobsWaitingOverview;
use Modules\Job\Models\JobsWaiting;
=======
declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

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
    public static function getWidgets(): array
    {
        return [
            JobsWaitingOverview::class,
        ];
    }
}
