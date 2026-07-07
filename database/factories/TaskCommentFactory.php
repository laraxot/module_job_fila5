<?php

declare(strict_types=1);

namespace Modules\Job\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Job\Models\TaskComment;

<<<<<<< HEAD
=======
/**
 * @extends Factory<TaskComment>
 */
>>>>>>> origin/dev
class TaskCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<TaskComment>
>>>>>>> origin/dev
     */
    protected $model = TaskComment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
