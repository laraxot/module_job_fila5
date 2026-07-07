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
     * @return array<string, mixed>
=======
     * @return array<int|string, mixed>
>>>>>>> origin/dev
     */
    public function execute(): array
    {
        $res = config('totem.frequencies');
        if (\is_array($res)) {
<<<<<<< HEAD
            /** @var array<string, mixed> */
=======
            /** @var array<int|string, mixed> */
>>>>>>> origin/dev
            return $res;
        }

        throw new Exception('['.__LINE__.']['.class_basename($this).']');
    }
}
