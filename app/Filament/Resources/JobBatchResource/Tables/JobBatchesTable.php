<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobBatchResource\Tables;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
>>>>>>> 860dff1 (.)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

/**
 * JobBatchesTable Schema.
 */
class JobBatchesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @return array<int|string, Column>
     */
    public function getTableColumns(): array
=======
     * @return array<int|string, \Filament\Tables\Columns\Column>
     */
    public static function getTableColumns(): array
>>>>>>> 860dff1 (.)
    {
        return [
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('total_jobs')->sortable(),
            TextColumn::make('pending_jobs')->sortable(),
            TextColumn::make('failed_jobs')->sortable(),
            TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
