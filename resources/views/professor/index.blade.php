@extends('layouts.basico')

@section('titulo', 'Listagem de professores')
@section('rota-botao')
    {{ route('professor.create') }}
@endsection
@section('texto-botao', 'Adicionar professor')

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
                    <th scope="col">E-mail</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($professores as $professor)
                    <tr>
                        <th scope="row">{{ $professor->id }}</th>
                        <td>{{ $professor->nome }}</td>
                        <td>{{ $professor->email }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('professor.edit', $professor->id) }}" class="btn-opcao" id="btn-editar">
                                    Editar
                                </a>
                                <form action="{{ route('professor.destroy', $professor->id) }}" method="POST">
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
