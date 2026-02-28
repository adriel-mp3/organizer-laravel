<h1>Login</h1>

@if ($errors->any())
    <div>
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('login.attempt') }}">
    @csrf

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Senha">

    <button type="submit">Entrar</button>
</form>