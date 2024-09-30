@extends('layouts.basico')

@section('titulo', 'Listagem de turmas')
@section('rota-botao')
    {{ route('turma.create') }}
@endsection
@section('texto-botao', 'Adicionar turma')

@section('conteudo')
    @if (session('sucesso'))
        <div class="alert alert-success ms-5">
            <p>{{ session('sucesso') }}</p>
        </div>
    @endif
    <div class="tabela">
        <p class="ms-5 mt-5">Listagem ({{ $resultados }} resultados)</p>
        <table class="table table-striped ms-5">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Curso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($turmas as $turma)
                    <tr>
                        <th scope="row">{{ $turma->id }}</th>
                        <td>{{ $turma->nome }}</td>
                        <td>{{ $turma->curso->nome }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('turma.edit', $turma->id) }}" class="btn-opcao" id="btn-editar">
                                    Editar
                                </a>
                                <form action="{{ route('turma.destroy', $turma->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="btn-excluir" class="btn-opcao ms-3">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
