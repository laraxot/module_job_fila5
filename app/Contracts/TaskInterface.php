<?php

declare(strict_types=1);

namespace Modules\Job\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Job\Models\Task;

/**
 * @phpstan-require-extends Model
 */
interface TaskInterface
{
    /**
     * Returns Eloquent Builder.
<<<<<<< HEAD
     *
     * @return Builder<Task>
=======
>>>>>>> c88446c (.)
     */
    public function builder(): Builder;

    /**
     * Returns a task by its primary key.
     */
    public function find(Task|int $id): Task;

    /**
     * Returns all tasks.
<<<<<<< HEAD
     *
     * @return Collection<int, Task>
=======
>>>>>>> c88446c (.)
     */
    public function findAll(): Collection;

    /**
     * Returns all active tasks.
<<<<<<< HEAD
     *
     * @return Collection<int, Task>
=======
>>>>>>> c88446c (.)
     */
    public function findAllActive(): Collection;

    /**
     * Creates a new task with the given data.
<<<<<<< HEAD
     *
     * @param  array<string, mixed>  $input
=======
>>>>>>> c88446c (.)
     */
    public function store(array $input): Task|bool;

    /**
     * Updates the given task with the given data.
<<<<<<< HEAD
     *
     * @param  array<string, mixed>  $input
=======
>>>>>>> c88446c (.)
     */
    public function update(array $input, Task $task): Task;

    /**
     * Deletes the given task.
     */
    public function destroy(Task|int $id): bool;

    /**
     * Executes the given task.
     */
    public function execute(Task|int $id): Task;
}
