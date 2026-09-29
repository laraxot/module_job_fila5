<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
<<<<<<< .merge_file_lbWp7s
=======
use Filament\Tables\Filters\BaseFilter;
>>>>>>> .merge_file_raZ5Eh
use Modules\Job\Filament\Resources\ImportResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListImports extends XotBaseListRecords
{
    protected static string $resource = ImportResource::class;

<<<<<<< .merge_file_lbWp7s

=======
    /**
     * @return array<string, BaseFilter>
     */
    #[Override]
    public function getTableFilters(): array
    {
        return [];
    }
>>>>>>> .merge_file_raZ5Eh


}
