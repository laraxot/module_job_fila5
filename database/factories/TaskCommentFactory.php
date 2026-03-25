<?php

declare(strict_types=1);

namespace Modules\Job\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Job\Models\TaskComment;

<<<<<<< HEAD
/**
 * @extends Factory<TaskComment>
 */
=======
>>>>>>> c88446c (.)
class TaskCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
     * @var class-string<TaskComment>
=======
>>>>>>> c88446c (.)
     */
    protected $model = TaskComment::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     * @return array<string, mixed>
=======
>>>>>>> c88446c (.)
     */
    public function definition(): array
    {
        return [];
    }
}
