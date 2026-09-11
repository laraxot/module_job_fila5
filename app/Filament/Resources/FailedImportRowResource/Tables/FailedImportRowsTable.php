<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\FailedImportRowResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class FailedImportRowsTable extends XotBaseResourceTable
{
    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'import_id' => TextColumn::make('import_id')->searchable()->sortable(),
            'validation_error' => TextColumn::make('validation_error')->searchable()->wrap()->limit(120),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
