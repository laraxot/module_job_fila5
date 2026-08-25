<?php

declare(strict_types=1);

namespace Modules\Job\Actions;

use Exception;
use Spatie\QueueableAction\QueueableAction;

class GetTaskFrequenciesAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
    * @return array<int|string, mixed>
=======
     * @return array<int|string, mixed>
>>>>>>> laraxot/dev
     */
    public function execute(): array
    {
        $res = config('totem.frequencies');
        if (\is_array($res)) {
<<<<<<< HEAD
           /** @var array<int|string, mixed> */
=======
            /** @var array<int|string, mixed> */
>>>>>>> laraxot/dev
            return $res;
        }

        throw new Exception('['.__LINE__.']['.class_basename($this).']');
    }
}
