<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\SelectFilter;
use Modules\Job\Filament\Resources\JobResource;
use Modules\Job\Models\Job;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListJobs extends XotBaseListRecords
{
    protected static string $resource = JobResource::class;




}
