<?php

declare(strict_types=1);

namespace Modules\Job\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Job\Models\TaskComment;

/**
 * @extends Factory<TaskComment>
 */
class TaskCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
    *
=======
     *
>>>>>>> laraxot/dev
     * @var class-string<TaskComment>
     */
    protected $model = TaskComment::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
    *
=======
     *
>>>>>>> laraxot/dev
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
