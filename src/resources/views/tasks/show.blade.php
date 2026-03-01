<h1>Detalhes da Tarefa</h1>

<p><strong>Título:</strong> {{ $task->title }}</p>
<p><strong>Descrição:</strong> {{ $task->description }}</p>
<p><strong>Status:</strong> {{ $task->status->value }}</p>
<p><strong>Criada em:</strong> {{ $task->created_at->format('d/m/Y H:i') }}</p>

<a href="{{ route('tasks.edit', $task) }}">Editar</a>
<a href="{{ route('tasks.index') }}">Voltar</a>

