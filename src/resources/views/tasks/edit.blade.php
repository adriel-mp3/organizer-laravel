<h1>Editar Tarefa</h1>

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @method('PUT')
    @include('tasks._form')
</form>

<a href="{{ route('tasks.index') }}">Voltar</a>

