<?php

declare(strict_types=1);

namespace Modules\Job\Enums;

use Modules\Xot\Traits\EnumTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasColor, HasIcon, HasLabel
{
<<<<<<< HEAD
   use EnumTrait;
=======
    use EnumTrait;
>>>>>>> laraxot/dev

    case Active = 'active';
    case Inactive = 'inactive';
    case Trashed = 'trashed';
    case One = '1';

}
