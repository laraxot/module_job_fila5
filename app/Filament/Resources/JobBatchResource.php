<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
/**
 * @see https://gitlab.com/amvisor/filament-failed-jobs/-/blob/master/src/resources/JobBatchesResource.php?ref_type=heads
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
namespace Modules\Job\Filament\Resources;

use Modules\Job\Filament\Resources\JobBatchResource\Pages\ListJobBatches;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class JobBatchResource extends XotBaseResource
{
    // //

    // protected static ?string $model = JobBatch::class;

    #[Override]
<<<<<<< HEAD
=======
    public function getFormSchemaOld(): array
    {
        return [];
    }

    #[Override]
>>>>>>> laraxot/dev
    public static function getPages(): array
    {
        return [
            'index' => ListJobBatches::route('/'),
        ];
    }
}
