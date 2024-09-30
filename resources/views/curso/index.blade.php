@extends('layouts.basico')

@section('titulo', 'Listagem de cursos')
@section('rota-botao')
    {{ route('curso.create') }}
@endsection
@section('texto-botao', 'Adicionar curso')

@section('conteudo')
    @if (session('sucesso'))
        <div class="alert alert-success ms-5 mt-3">
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
                    <th scope="col">Área</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <th scope="row">{{ $curso->id }}</th>
                        <td>{{ $curso->nome }}</td>
                        <td>{{ $curso->area->nome ?? 'n' }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('curso.edit', $curso->id) }}" class="btn-opcao" id="btn-editar">
                                    Editar
                                </a>
                                <form action="{{ route('curso.destroy', $curso->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-opcao ms-3" id="btn-excluir">
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
