@extends('layouts.basico')

@section('titulo', 'Adicionar aluno')
@section('rota-botao')
    {{ route('aluno.index') }}
@endsection
@section('texto-botao', 'Voltar')

@section('conteudo')
    <form action="{{ route('aluno.store') }}" class="ms-5 mt-5 border pb-3" method="POST">
        @csrf
        <p class="titulo-form">Cadastro de novo aluno</p>
        @if (session('sucesso'))
            <div class="alert alert-success">
                <p>{{ session('sucesso') }}</p>
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif
        <div class="d-flex ps-3 mb-3">
            <div class="d-grid">
                <p class="texto-campo">Nome do aluno</p>
                <input type="text" placeholder="Nome do aluno" name="nome" class="input-cadastro-aluno">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Turma</p>
                <select name="turma" class="input-cadastro-aluno">
                    <option selected>Selecione uma turma</option>
                    @foreach ($turmas as $turma)
                        <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex ps-3 mb-3">
            <div class="d-grid">
                <p class="texto-campo">E-mail</p>
                <input type="email" placeholder="E-mail" name="email" class="input-cadastro-aluno">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Telefone</p>
                <input type="tel" placeholder="(99)9999-9999" name="telefone" class="input-cadastro-aluno">
            </div>
        </div>
        <div class="d-flex ps-3 mb-3">
            <div class="d-grid">
                <p class="texto-campo">Senha</p>
                <input type="password" placeholder="Senha" name="senha" class="input-cadastro-aluno">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Confirmar senha</p>
                <input type="password" placeholder="Senha" name="senha_confirmation" class="input-cadastro-aluno">
            </div>
        </div>
        <div class="d-flex mt-5 ps-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('aluno.index') }}" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
@endsection
