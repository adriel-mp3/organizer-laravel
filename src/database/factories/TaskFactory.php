<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\TaskStatus;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'status' => TaskStatus::Pending->value,
        ];
    }

    public function completed(): static
    {
        return $this->state(fn() => [
            'status' => TaskStatus::Completed->value,
        ]);
    }

    public function inProgress(): static
    {
        return $this->state(fn() => [
            'status' => TaskStatus::InProgress->value,
        ]);
    }

    public function peding(): static
    {
        return $this->state(fn() => [
            'status' => TaskStatus::Pending->value,
        ]);
    }
}
