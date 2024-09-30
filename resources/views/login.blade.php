<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="d-flex justify-content-center vh-100 align-items-center">
        <div class="tela">
            <h3 class="titulo-login">Logar no sistema</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="d-grid gap-3 login-container">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h5>{{ $errors->first() }}</h5>
                        </div>
                    @endif
                    <input type="email" name="email" placeholder="E-mail" class="input-login">
                    <input type="password" name="senha" placeholder="Senha" class="input-login">
                    <button type="submit" id="btn-entrar">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
