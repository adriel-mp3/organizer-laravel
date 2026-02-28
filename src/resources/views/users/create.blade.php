<h1>Criar Usuário</h1>

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Nome">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Senha">
    <input type="password" name="password_confirmation" placeholder="Confirmar senha">

    <button type="submit">Salvar</button>
</form>