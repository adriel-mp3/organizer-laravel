<h1>Detalhes do Usuário</h1>

<a href="{{ route('users.index') }}">Voltar</a>

<hr>

<p>
    <strong>ID:</strong> {{ $user->id }}
</p>
<p>
    <strong>Nome:</strong> {{ $user->name }}
</p>
<p>
    <strong>Email:</strong> {{ $user->email }}
</p>
<p>
    <strong>Criado em:</strong> {{ $user->created_at }}
</p>
<p>
    <strong>Atualizado em:</strong> {{ $user->updated_at }}
</p>

<hr>

<a href="{{ route('users.edit', $user) }}">Editar</a>