<?php

declare(strict_types=1);

namespace Modules\Job\Actions;

<<<<<<< HEAD
=======
use BadMethodCallException;
>>>>>>> laraxot/dev
use Spatie\QueueableAction\QueueableAction;

class ExecuteTaskAction
{
    use QueueableAction;

    public function execute(string $taskId): string
    {
        // TODO: Implement task execution
        // See ROADMAP-2026.md Phase 1 - Critical Fixes
<<<<<<< HEAD
        throw new \BadMethodCallException(
=======
        throw new BadMethodCallException(
>>>>>>> laraxot/dev
            'Method ExecuteTaskAction::execute() not implemented yet. See ROADMAP-2026.md'
        );
    }
}
