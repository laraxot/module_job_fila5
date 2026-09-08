<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Modules\Job\Models\Import;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ImportResource extends XotBaseResource
{
    protected static ?string $model = Import::class;
}
