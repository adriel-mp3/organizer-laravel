<h1>Nova Tarefa</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @include('tasks._form')
</form>

<a href="{{ route('tasks.index') }}">Voltar</a>

