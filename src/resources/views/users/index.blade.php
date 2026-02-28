<h1>Usuários</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('users.create') }}">Criar Usuário</a>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}">Editar</a>

                <form method="POST" action="{{ route('users.destroy', $user) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Deletar</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $users->links() }}