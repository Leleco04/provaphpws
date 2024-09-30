@extends('layouts.basico')

@section('titulo', 'Listagem de disciplinas')
@section('rota-botao')
    {{ route('disciplina.create') }}
@endsection
@section('texto-botao', 'Adicionar disciplina')

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
                    <th scope="col">Turma</th>
                    <th scope="col">Professor</th>
                    <th scope="col">Segunda-Feira</th>
                    <th scope="col">Terça-Feira</th>
                    <th scope="col">Quarta-Feira</th>
                    <th scope="col">Quinta-Feira</th>
                    <th scope="col">Sexta-Feira</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disciplinas as $disciplina)
                    @php
                        $aulaSegunda = $disciplina->segunda_feira ? 'Sim' : 'Não';
                        $aulaTerca = $disciplina->terca_feira ? 'Sim' : 'Não';
                        $aulaQuarta = $disciplina->quarta_feira ? 'Sim' : 'Não';
                        $aulaQuinta = $disciplina->quinta_feira ? 'Sim' : 'Não';
                        $aulaSexta = $disciplina->sexta_feira ? 'Sim' : 'Não';
                    @endphp
                    <tr>
                        <th scope="row">{{ $disciplina->id }}</th>
                        <td>{{ $disciplina->nome }}</td>
                        <td>{{ $disciplina->turma->nome }}</td>
                        <td>{{ $disciplina->professor->nome }}</td>
                        <td>{{ $aulaSegunda }}</td>
                        <td>{{ $aulaTerca }}</td>
                        <td>{{ $aulaQuarta }}</td>
                        <td>{{ $aulaQuinta }}</td>
                        <td>{{ $aulaSexta }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('disciplina.edit', $disciplina->id) }}" class="btn-opcao"
                                    id="btn-editar">
                                    Editar
                                </a>
                                <form action="{{ route('disciplina.destroy', $disciplina->id) }}" method="POST">
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
