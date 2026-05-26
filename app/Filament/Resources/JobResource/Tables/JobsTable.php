<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobResource\Tables;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class JobsTable extends XotBaseResourceTable
{
    /**
     * @return array<string, Column>
     */
    public static function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable(),
            'queue' => TextColumn::make('queue')->searchable()->sortable(),
            'attempts' => TextColumn::make('attempts')->sortable(),
            'available_at' => TextColumn::make('available_at')->dateTime()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
=======
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
    public function getTableColumns(): array
    {
    /**
     * @return array<int\|string, \Filament\Tables\Columns\Column>
     */
        return [
            TextColumn::make('id')->sortable(),
            TextColumn::make('queue')->searchable()->sortable(),
            TextColumn::make('attempts')->sortable(),
            TextColumn::make('available_at')->dateTime()->sortable(),
            TextColumn::make('created_at')->dateTime()->sortable(),
>>>>>>> 860dff1 (.)
        ];
    }
}
