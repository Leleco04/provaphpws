<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <header>
        <h2>Sistema de gerenciamento - SENAI</h2>
        <h4>O sistema utilizado por todas as unidades do senai em todo o Brasil, <br> utilizada por mais de 5.000.000 de
            alunos.</h4>
    </header>
    <div class="d-flex justify-content-center cards-login-container gap-5">
        <div class="card">
            <h5>Administrador</h5>
            <p>Acesse a aplicação como administrador.</p>
            <a href="{{ route('login') }}"><button class="btn btn-primary">Sou administrador</button></a>
        </div>
        <div class="card">
            <h5>Professor</h5>
            <p>Acesse a aplicação como professor.</p>
            <a href="#"><button class="btn btn-primary">Sou professor</button></a>
        </div>
        <div class="card">
            <h5>Aluno</h5>
            <p>Acesse a aplicação como aluno.</p>
            <a href="#"><button class="btn btn-primary">Sou aluno</button></a>
        </div>
    </div>
</body>

</html>
