@extends('layouts.basico')

@section('titulo', 'Editar turma')
@section('rota-botao')
    {{ route('turma.index') }}
@endsection
@section('texto-botao', 'Voltar')

@section('conteudo')
    <form action="{{ route('turma.update', $turma->id) }}" class="ms-5 mt-5 border pb-3" method="POST">
        @csrf
        @method('PUT')
        <p class="titulo-form">Edição turma</p>
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
                <p class="texto-campo">Nome da turma</p>
                <input type="text" placeholder="Nome da turma" name="nome" class="input-cadastro-aluno"
                    value="{{ $turma->nome }}">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Curso</p>
                <select name="curso" class="input-cadastro-aluno">
                    <option value="{{ $turma->curso_id }}" selected>{{ $turma->curso->nome }}</option>
                    @foreach ($cursos as $curso)
                        @if ($turma->curso_id != $curso->id)
                            <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex mt-5 ps-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('turma.index') }}" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
@endsection
