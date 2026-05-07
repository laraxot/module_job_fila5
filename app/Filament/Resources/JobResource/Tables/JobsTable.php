<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobResource\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

/**
 * JobsTable Schema.
 */
class JobsTable extends XotBaseResourceTable
{
    /**
     * @return array<int|string, \Filament\Tables\Columns\Column>
     */
    public static function getTableColumns(): array
    {
        return [
            TextColumn::make('id')->sortable(),
            TextColumn::make('queue')->searchable()->sortable(),
            TextColumn::make('attempts')->sortable(),
            TextColumn::make('available_at')->dateTime()->sortable(),
            TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
