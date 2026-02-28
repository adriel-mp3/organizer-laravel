<h1>Editar Usuário</h1>

<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $user->name }}">
    <input type="email" name="email" value="{{ $user->email }}">

    <button type="submit">Atualizar</button>
</form>