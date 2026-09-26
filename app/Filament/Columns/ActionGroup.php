<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/v2.0.0/src/Filament/Columns/ActionGroup.php
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
namespace Modules\Job\Filament\Columns;

use Filament\Actions\Concerns\InteractsWithRecord;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Actions\XotBaseActionGroup;

/**
 * @property Model $record
 */
class ActionGroup extends XotBaseActionGroup
{
    use InteractsWithRecord;

<<<<<<< HEAD
    public const ICON_BUTTON_VIEW = 'job::components.action-group';
=======
    public const string ICON_BUTTON_VIEW = 'job::components.action-group';
>>>>>>> laraxot/dev

    protected string $view = 'job::components.action-group';

    public function getActions(): array
    {
        return [];
    }
}
