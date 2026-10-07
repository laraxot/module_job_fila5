<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobsWaitingResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
=======
use Illuminate\Support\Carbon;
use Modules\Job\Models\JobsWaiting;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class JobsWaitingsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
     * @var class-string<JobsWaiting>
     */
    protected static string $model = JobsWaiting::class;

    /**
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable(),
<<<<<<< HEAD
            'name' => TextColumn::make('name')->searchable(),
=======
            'queue' => TextColumn::make('queue')->searchable()->sortable()->badge(),
            'attempts' => TextColumn::make('attempts')->numeric()->sortable(),
            'available_at' => TextColumn::make('available_at')->formatStateUsing(static fn (int $state): string => Carbon::createFromTimestamp($state)->format('Y-m-d H:i:s'))->sortable(),
            'reserved_at' => TextColumn::make('reserved_at')->formatStateUsing(static fn (int $state): string => Carbon::createFromTimestamp($state)->format('Y-m-d H:i:s'))->sortable(),
>>>>>>> laraxot/dev
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
