<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Modules\Job\Filament\Resources\ImportResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListImports extends XotBaseListRecords
{
    protected static string $resource = ImportResource::class;
<<<<<<< .merge_file_tKWVDm
   
=======

    /**
     * @return array<string, Tables\Columns\Column>
     */
<<<<<<< HEAD
    
=======
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'file_name' => TextColumn::make('file_name')
                ->searchable()
                ->sortable()
                ->wrap(),
            'file_disk' => TextColumn::make('file_disk')->searchable()->sortable(),
            'importer' => TextColumn::make('importer')->searchable()->sortable(),
            'processed_rows' => TextColumn::make('processed_rows')->numeric()->sortable(),
            'total_rows' => TextColumn::make('total_rows')->numeric()->sortable(),
            'successful_rows' => TextColumn::make('successful_rows')->numeric()->sortable(),
            'completed_at' => TextColumn::make('completed_at')->dateTime()->sortable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4omT0P

    /**
     * @return array<string, BaseFilter>
     */
<<<<<<< .merge_file_tKWVDm
    #[Override]
=======
<<<<<<< HEAD
=======
    #[Override]
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4omT0P
    public function getTableFilters(): array
    {
        return [];
    }

    /**
     * @return array<string, Action|ActionGroup>
     */
<<<<<<< .merge_file_tKWVDm
    #[Override]
=======
<<<<<<< HEAD
=======
    #[Override]
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4omT0P
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make(),
        ];
    }

    /**
     * @return array<string, BulkAction>
     */
<<<<<<< .merge_file_tKWVDm
    #[Override]
=======
<<<<<<< HEAD
=======
    #[Override]
>>>>>>> laraxot/dev
>>>>>>> .merge_file_4omT0P
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }
}
