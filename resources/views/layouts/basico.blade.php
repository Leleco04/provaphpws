<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sistema.css') }}">
</head>

<body>
    <header>
        @include('components.header')
    </header>
    <div class="d-flex">
        @include('components.nav-lateral')
        <div>
            <div class="d-flex ms-5 mt-5 align-items-center div-titulo-botao">
                <h3>@yield('titulo')</h3>
                <div class="d-flex justify-content-end div-botao">
                    <a href="@yield('rota-botao')">
                        <button class="btn-voltar">@yield('texto-botao')</button>
                    </a>
                </div>
            </div>
            <span class="barra ms-5"></span>
            @yield('conteudo')
        </div>
    </div>
</body>

</html>
