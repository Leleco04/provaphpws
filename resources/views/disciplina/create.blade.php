@extends('layouts.basico')

@section('titulo', 'Adicionar disciplina')
@section('rota-botao')
    {{ route('disciplina.index') }}
@endsection
@section('texto-botao', 'Voltar')

@section('conteudo')
    <form action="{{ route('disciplina.store') }}" class="ms-5 mt-5 border pb-3" method="POST">
        @csrf
        <p class="titulo-form">Cadastro de nova disciplina</p>
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
                <p class="texto-campo">Nome da disciplina</p>
                <input type="text" placeholder="Nome da disciplina" name="nome" class="input-cadastro-aluno">
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
        <div class="d-flex justify-content-center">
            <div class="d-grid">
                <p class="texto-campo">Professor</p>
                <select name="professor" class="input-cadastro-aluno">
                    <option selected>Selecione um professor</option>
                    @foreach ($professores as $professor)
                        <option value="{{ $professor->id }}">{{ $professor->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-5 mt-3">
            <div class="d-grid">
                <p class="texto-campo">Segunda-feira</p>
                <input type="checkbox" name="segunda">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Terça-feira</p>
                <input type="checkbox" name="terca">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Quarta-feira</p>
                <input type="checkbox" name="quarta">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Quinta-feira</p>
                <input type="checkbox" name="quinta">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Sexta-feira</p>
                <input type="checkbox" name="sexta">
            </div>
        </div>
        <div class="d-flex mt-5 ps-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('disciplina.index') }}" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
@endsection
