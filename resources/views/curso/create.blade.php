@extends('layouts.basico')

@section('titulo', 'Adicionar curso')
@section('rota-botao')
    {{ route('curso.index') }}
@endsection
@section('texto-botao', 'Voltar')

@section('conteudo')
    <form action="{{ route('curso.store') }}" class="ms-5 mt-5 border pb-3" method="POST">
        @csrf
        <p class="titulo-form">Cadastro de novo curso</p>
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
                <p class="texto-campo">Nome do curso</p>
                <input type="text" placeholder="Nome do curso" name="nome" class="input-cadastro-aluno">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Área</p>
                <select name="area" class="input-cadastro-aluno">
                    <option selected>Selecione uma área</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex mt-5 ps-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('curso.index') }}" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
@endsection
