@extends('layouts.basico')

@section('titulo', 'Listagem de alunos')
@section('rota-botao')
    {{ route('aluno.create') }}
@endsection
@section('texto-botao', 'Adicionar aluno')

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
                    <th scope="col">Turma</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $aluno)
                    <tr>
                        <td scope="row">{{ $aluno->id }}</td>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->turma->nome }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ $aluno->telefone }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('aluno.edit', $aluno->id) }}" id="btn-editar" class="btn-opcao">
                                    Editar
                                </a>
                                <form action="{{ route('aluno.destroy', $aluno->id) }}" method="POST">
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
