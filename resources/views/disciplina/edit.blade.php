@extends('layouts.basico')

@section('titulo', 'Editar disciplina')
@section('rota-botao')
    {{ route('disciplina.index') }}
@endsection
@section('texto-botao', 'Voltar')

@section('conteudo')
    <form action="{{ route('disciplina.update', $disciplina->id) }}" class="ms-5 mt-5 border pb-3" method="POST">
        @csrf
        @method('PUT')
        <p class="titulo-form">Editar disciplina</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif
        <div class="d-flex ps-3 mb-3">
            <div class="d-grid">
                <p class="texto-campo">Nome da disciplina</p>
                <input type="text" placeholder="Nome da disciplina" name="nome" class="input-cadastro-aluno"
                    value="{{ $disciplina->nome }}">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Turma</p>
                <select name="turma" class="input-cadastro-aluno">
                    <option value="{{ $disciplina->turma->id }}" selected>{{ $disciplina->turma->nome }}</option>
                    @foreach ($turmas as $turma)
                        @if ($turma->id != $disciplina->turma->id)
                            <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="d-grid">
                <p class="texto-campo">Professor</p>
                <select name="professor" class="input-cadastro-aluno">
                    <option value="{{ $disciplina->professor->id }}" selected>{{ $disciplina->professor->nome }}</option>
                    @foreach ($professores as $professor)
                        @if ($professor->id != $disciplina->professor->id)
                            <option value="{{ $professor->id }}">{{ $professor->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-5 mt-3">
            <div class="d-grid">
                <p class="texto-campo">Segunda-feira</p>
                @if ($disciplina->segunda_feira)
                    <input type="checkbox" name="segunda" checked>
                @else
                    <input type="checkbox" name="segunda">
                @endif
            </div>
            <div class="d-grid">
                <p class="texto-campo">Terça-feira</p>
                @if ($disciplina->terca_feira)
                    <input type="checkbox" name="terca" checked>
                @else
                    <input type="checkbox" name="terca">
                @endif
            </div>
            <div class="d-grid">
                <p class="texto-campo">Quarta-feira</p>
                @if ($disciplina->quarta_feira)
                    <input type="checkbox" name="quarta" checked>
                @else
                    <input type="checkbox" name="quarta">
                @endif
            </div>
            <div class="d-grid">
                <p class="texto-campo">Quinta-feira</p>
                @if ($disciplina->quinta_feira)
                    <input type="checkbox" name="quinta" checked>
                @else
                    <input type="checkbox" name="quinta">
                @endif
            </div>
            <div class="d-grid">
                <p class="texto-campo">Sexta-feira</p>
                @if ($disciplina->sexta_feira)
                    <input type="checkbox" name="sexta" checked>
                @else
                    <input type="checkbox" name="sexta">
                @endif
            </div>
        </div>
        <div class="d-flex mt-5 ps-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('disciplina.index') }}" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
@endsection
