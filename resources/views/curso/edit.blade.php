@extends('layouts.basico')

@section('titulo', 'Editar curso')
@section('rota-botao')
    {{ route('curso.index') }}
@endsection
@section('texto-botao', 'Voltar')

@section('conteudo')
    <form action="{{ route('curso.update', $curso->id) }}" class="ms-5 mt-5 border pb-3" method="POST">
        @csrf
        @method('PUT')
        <p class="titulo-form">Editar curso</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif
        <div class="d-flex ps-3 mb-3">
            <div class="d-grid">
                <p class="texto-campo">Nome do curso</p>
                <input type="text" placeholder="Nome do curso" name="nome" class="input-cadastro-aluno"
                    value="{{ $curso->nome }}">
            </div>
            <div class="d-grid">
                <p class="texto-campo">Área</p>
                <select name="area" class="input-cadastro-aluno">
                    <option value={{ $curso->area->id }} selected>{{ $curso->area->nome }}</option>
                    @foreach ($areas as $area)
                        @if ($area->id != $curso->area->id)
                            <option value="{{ $area->id }}">{{ $area->nome }}</option>
                        @endif
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
