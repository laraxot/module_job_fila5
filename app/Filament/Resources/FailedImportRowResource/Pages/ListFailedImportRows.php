<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\FailedImportRowResource\Pages;

<<<<<<< HEAD
use Modules\Job\Filament\Resources\FailedImportRowResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
=======
use Filament\Tables\Columns\TextColumn;
use Modules\Job\Filament\Resources\FailedImportRowResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;
>>>>>>> laraxot/dev

class ListFailedImportRows extends XotBaseListRecords
{
    protected static string $resource = FailedImportRowResource::class;
<<<<<<< HEAD
=======

    #[Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'import_id' => TextColumn::make('import_id')
                ->searchable()
                ->sortable()
                ->copyable(),
            'data' => TextColumn::make('data')
                ->searchable()
                ->wrap()
                ->limit(100),
            'validation_error' => TextColumn::make('validation_error')
                ->searchable()
                ->wrap()
                ->limit(200),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable(),
        ];
    }
>>>>>>> laraxot/dev
}
