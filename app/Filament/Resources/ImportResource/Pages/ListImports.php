<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Modules\Job\Filament\Resources\ImportResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListImports extends XotBaseListRecords
{
    protected static string $resource = ImportResource::class;




}
