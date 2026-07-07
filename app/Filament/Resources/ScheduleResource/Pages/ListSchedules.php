<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Closure;
<<<<<<< HEAD
=======
use Filament\Actions\ActionGroup;
>>>>>>> origin/dev
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
<<<<<<< HEAD
=======
use Override;
>>>>>>> origin/dev
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Job\Models\Schedule;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListSchedules extends XotBaseListRecords
{
    protected static string $resource = ScheduleResource::class;

    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->numeric()
                ->sortable()
                ->searchable(),
            'command' => TextColumn::make('command')->sortable()->searchable(),
            'params' => TextColumn::make('params')->wrap()->searchable(),
            'expression' => TextColumn::make('expression')->sortable()->searchable(),
            'timezone' => TextColumn::make('timezone')->sortable()->searchable(),
            'is_active' => IconColumn::make('is_active')->boolean()->sortable(),
            'without_overlapping' => IconColumn::make('without_overlapping')->boolean()->sortable(),
            'on_one_server' => IconColumn::make('on_one_server')->boolean()->sortable(),
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

<<<<<<< HEAD
    public function getListTableActions(): array
    {
        return [
            EditAction::make()
                ->hidden(static fn (Schedule $record): bool => $record->deleted_at !== null)
                ->tooltip(__('filament-support::actions/edit.single.label')),
            RestoreAction::make()->tooltip(__('filament-support::actions/restore.single.label')),
            DeleteAction::make()->tooltip(__('filament-support::actions/delete.single.label')),
            ForceDeleteAction::make()->tooltip(__(
                'filament-support::actions/force-delete.single.label',
            )),
            ViewAction::make()
=======
    /**
     * @return array<string, EditAction|RestoreAction|DeleteAction|ForceDeleteAction|ViewAction|ActionGroup>
     */
    #[Override]
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make()
                ->hidden(static fn (Schedule $record): bool => $record->deleted_at !== null)
                ->tooltip(__('filament-support::actions/edit.single.label')),
            'restore' => RestoreAction::make()->tooltip(__('filament-support::actions/restore.single.label')),
            'delete' => DeleteAction::make()->tooltip(__('filament-support::actions/delete.single.label')),
            'forceDelete' => ForceDeleteAction::make()->tooltip(__(
                'filament-support::actions/force-delete.single.label',
            )),
            'history' => ViewAction::make()
>>>>>>> origin/dev
                ->icon('history')
                ->color('gray')
                ->tooltip(static::trans('buttons.history')),
        ];
    }

<<<<<<< HEAD
    public function getListTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
=======
    /**
     * @return array<string, DeleteBulkAction>
     */
    #[Override]
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
>>>>>>> origin/dev
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return static fn (): ?string => null;
    }
}
