<?php

declare(strict_types=1);

namespace Modules\Job\Actions;

use Illuminate\Support\Facades\Artisan;
use Modules\Job\Models\Task;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class ExecuteTaskAction
{
    use QueueableAction;

    public function execute(string $taskId): string
    {
        $task = Task::query()->findOrFail($taskId);
        $command = $task->command;
        Assert::stringNotEmpty($command, '['.__LINE__.']['.class_basename($this).']');

        $registered = array_keys(Artisan::all());
        Assert::inArray($command, $registered, sprintf('Command [%s] is not registered.', $command));

        Artisan::call($command, $task->compileParameters());

        return Artisan::output();
    }
}
