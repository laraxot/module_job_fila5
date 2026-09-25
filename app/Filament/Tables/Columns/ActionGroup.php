<?php

/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/v2.0.0/src/Filament/Columns/ActionGroup.php
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Tables\Columns;

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
    public const string ICON_BUTTON_VIEW = 'job::components.action-group';
=======
    public const ICON_BUTTON_VIEW = 'job::components.action-group';
>>>>>>> laraxot/dev

    protected string $view = 'job::components.action-group';

    public function getActions(): array
    {
        return [];
    }
}
