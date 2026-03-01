<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Enum;
use App\Enums\TaskStatus;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->user()
            ->tasks()
            ->latest()
            ->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Task::class)) {
            abort(403);
        }

        return view('tasks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->cannot('create', Task::class)) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => ['required', new Enum(TaskStatus::class)],
        ]);

        $request->user()->tasks()->create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarefa criada com sucesso.');
    }

    public function show(Request $request, Task $task)
    {
        if ($request->user()->cannot('view', $task)) {
            abort(403);
        }

        return view('tasks.show', compact('task'));
    }

    public function edit(Request $request, Task $task)
    {
        if ($request->user()->cannot('update', $task)) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        if ($request->user()->cannot('update', $task)) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => ['required', new Enum(TaskStatus::class)],
        ]);

        $task->update($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarefa atualizada.');
    }

    public function destroy(Request $request, Task $task): RedirectResponse
    {
        if ($request->user()->cannot('delete', $task)) {
            abort(403);
        }

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarefa removida.');
    }
}