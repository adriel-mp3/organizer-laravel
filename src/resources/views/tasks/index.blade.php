<h1>Minhas Tarefas</h1>

<a href="{{ route('tasks.create') }}">Nova Tarefa</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<ul>
@forelse($tasks as $task)
    <li>
        <strong>{{ $task->title }}</strong>
        ({{ $task->status->value }})

        <a href="{{ route('tasks.show', $task) }}">Ver</a>
        <a href="{{ route('tasks.edit', $task) }}">Editar</a>

        <form 
            action="{{ route('tasks.destroy', $task) }}" 
            method="POST"
            style="display:inline;"
        >
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </li>
@empty
    <p>Nenhuma tarefa cadastrada.</p>
@endforelse
</ul>

{{ $tasks->links() }}
