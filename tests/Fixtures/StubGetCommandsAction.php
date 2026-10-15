<?php

declare(strict_types=1);

namespace Tests\Modules\Job\Fixtures;

use Modules\Job\Actions\Command\GetCommandsAction;
use Modules\Job\Datas\CommandData;
use Spatie\LaravelData\DataCollection;

class StubGetCommandsAction extends GetCommandsAction
{
    /** @var DataCollection<int, CommandData> */
    private DataCollection $collection;

    /**
     * @param  DataCollection<int, CommandData>  $collection
     */
    public function __construct(DataCollection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return DataCollection<int, CommandData>
     */
    public function execute(): DataCollection
    {
        return $this->collection;
    }
}
