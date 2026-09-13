<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Modules\Job\Filament\Resources\JobResource\Pages\BoardJobs;
use Modules\Job\Filament\Resources\JobResource\Pages\CreateJob;
use Modules\Job\Filament\Resources\JobResource\Pages\EditJob;
use Modules\Job\Filament\Resources\JobResource\Pages\ListJobs;
use Modules\Job\Filament\Resources\JobResource\Widgets\JobStatsOverview;
use Modules\Job\Models\Job;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class JobResource extends XotBaseResource
{
    protected static ?string $model = Job::class;
<<<<<<< .merge_file_7MiMrQ

    #[Override]
=======
<<<<<<< HEAD
=======

    #[Override]
    public static function getFormSchema(): array
    {
        return [];
    }

    #[Override]
>>>>>>> laraxot/dev
>>>>>>> .merge_file_70d5dq
    public static function getRelations(): array
    {
        return [];
    }
<<<<<<< .merge_file_7MiMrQ

    #[Override]
=======
<<<<<<< HEAD
=======

    #[Override]
>>>>>>> laraxot/dev
>>>>>>> .merge_file_70d5dq
    public static function getPages(): array
    {
        return [
            'index' => ListJobs::route('/'),
            'create' => CreateJob::route('/create'),
            'board' => BoardJobs::route('/board'),
            'edit' => EditJob::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            JobStatsOverview::class,
        ];
    }
}
