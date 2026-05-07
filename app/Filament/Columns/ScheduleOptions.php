<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Columns;

use Filament\Tables\Columns\TextColumn;

class ScheduleOptions extends TextColumn
{
<<<<<<< Updated upstream
    protected $withValue = true;
=======
    /** @var bool */
    protected bool $withValue = true;
>>>>>>> Stashed changes

    public function withValue(bool $withValue = true): static
    {
        $this->withValue = $withValue;

        return $this;
    }

    public function getTags(): array
    {
        /*
         * if($this->record==null){
         * return [];
         * }
         * if($this->withValue)
         * return $this->record->getOptions();
         * else{
         * return parent::getTags();
         * }
         */
        return [];
    }
}
