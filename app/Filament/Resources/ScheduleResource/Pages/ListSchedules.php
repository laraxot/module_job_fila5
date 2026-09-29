<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Job\Models\Schedule;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListSchedules extends XotBaseListRecords
{
    protected static string $resource = ScheduleResource::class;





}
