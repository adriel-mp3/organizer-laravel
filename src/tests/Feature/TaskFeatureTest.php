<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use App\Enums\TaskStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_task(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('tasks.store'), [
            'title' => 'Nova Task',
            'description' => 'Descrição teste',
            'status' => TaskStatus::Pending->value,
        ]);

        $response->assertRedirect(route('tasks.index'));

        $this->assertDatabaseHas('tasks', [
            'title' => 'Nova Task',
            'user_id' => $user->id,
            'status' => TaskStatus::Pending->value,
        ]);
    }

    public function test_task_belongs_to_authenticated_user(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('tasks.store'), [
            'title' => 'Minha Task',
            'status' => TaskStatus::Pending->value,
        ]);

        $this->assertDatabaseCount('tasks', 1);

        $task = Task::first();

        $this->assertEquals($user->id, $task->user_id);
    }

    public function test_user_cannot_view_task_of_another_user(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();

        $task = Task::factory()->create([
            'user_id' => $owner->id
        ]);

        $response = $this->actingAs($intruder)
            ->get(route('tasks.show', $task));

        $response->assertForbidden();
    }

    public function test_user_can_delete_own_task(): void
    {
        $user = User::factory()->create();

        $task = Task::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->delete(route('tasks.destroy', $task));

        $response->assertRedirect(route('tasks.index'));

        $this->assertModelMissing($task);
    }

    public function test_status_must_be_valid_enum(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('tasks.store'), [
            'title' => 'Task inválida',
            'status' => 'invalid_status',
        ]);

        $response->assertSessionHasErrors('status');

        $this->assertDatabaseCount('tasks', 0);
    }
}