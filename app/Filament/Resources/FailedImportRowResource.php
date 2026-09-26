<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

<<<<<<< HEAD
=======
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
>>>>>>> laraxot/dev
use Modules\Job\Models\FailedImportRow;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class FailedImportRowResource extends XotBaseResource
{
    protected static ?string $model = FailedImportRow::class;

    #[Override]
<<<<<<< HEAD
=======
    public function getFormSchemaOld(): array
    {
        return [
            'import_class' => TextInput::make('import_class')->required()->maxLength(255),
            'row_number' => TextInput::make('row_number')->numeric()->required(),
            'row_data' => Textarea::make('row_data')->required()->columnSpanFull(),
            'error_message' => Textarea::make('error_message')->required()->columnSpanFull(),
        ];
    }

    #[Override]
>>>>>>> laraxot/dev
    public static function getRelations(): array
    {
        return [];
    }
}
