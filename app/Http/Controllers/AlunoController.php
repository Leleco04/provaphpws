<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;

class AlunoController extends Controller
{
    public function index()
    {
        // Conta a quantidade de registros em alunos
        $resultados = Aluno::all()->count();
        // Pega todos os registros de alunos
        $alunos = Aluno::with('turma')->get();
        // Retorna a view aluno.index (listagem) com a contagem e os alunos
        return view('aluno.index', ['alunos' => $alunos, 'resultados' => $resultados]);
    }

    public function create()
    {
        // Pega todas as turmas cadastradas
        $turmas = Turma::all();
        // Retorna a view de formulário para cadastro de novo aluno
        return view('aluno.create', ['turmas' => $turmas]);
    }

    public function store(Request $request)
    {
        // Define as regras de preenchimento dos campos
        $regras = [
            'nome' => 'required',
            'turma' => 'required',
            'email' => 'required|email|unique:alunos',
            'telefone' => 'required',
            'senha' => 'confirmed'
        ];

        // Define as mensagens caso um campo não responda aos requisitos acima
        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'email' => 'O campo e-mail está no formato incorreto.',
            'unique' => 'E-mail já cadastrado.',
            'confirmed' => 'As senhas não coincidem'
        ];

        // Valida os valores enviados pelo método POST, utilizando as regras e as mensagens de feedback
        $request->validate($regras, $feedbacks);

        // Salva os valores no modelo de aluno
        $aluno = new Aluno();
        $aluno->nome = $request->nome;
        $aluno->turma_id = $request->turma;
        $aluno->email = $request->email;
        $aluno->telefone = $request->telefone;
        $aluno->senha = bcrypt($request->senha);
        // Salva os dados novos no banco
        $aluno->save();

        // Retorna a view de formulário de cadastro de aluno, com uma mensagem de sucesso
        return redirect()->route('aluno.create')->with(['sucesso' => 'Aluno cadastrado com sucesso!']);
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $turmas = Turma::all();
        // Pega o aluno que será editado, através do parâmetro id
        $aluno = Aluno::find($id);
        // Envia o aluno para a view como parâmetro
        return view('aluno.edit', ['aluno' => $aluno, 'turmas' => $turmas]);
    }

    public function update(Request $request, string $id)
    {
        // Define regras e mensagens de feedback
        $regras = [
            'nome' => 'required',
            'email' => 'required|email|',
            'telefone' => 'required',
            'senha' => 'confirmed'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'email' => 'O campo e-mail está no formato incorreto.',
            'confirmed' => 'As senhas não coincidem'
        ];

        // Valida o request
        $request->validate($regras, $feedbacks);

        // Salva em $aluno, o aluno que será editado
        $aluno = Aluno::find($id);
        $aluno->nome = $request->nome;
        $aluno->turma_id = $request->turma;
        $aluno->email = $request->email;
        $aluno->telefone = $request->telefone;
        $aluno->senha = bcrypt($request->senha);
        // Atualiza o aluno no banco
        $aluno->update();

        // Retorna a view de listagem de alunos com uma mensagem de sucesso
        return redirect()->route('aluno.index')->with(['sucesso' => 'Aluno atualizado com sucesso!']);
    }

    public function destroy(string $id)
    {
        // Guarda o aluno que será excluido
        $aluno = Aluno::find($id);
        // Deleta o aluno
        $aluno->delete();
        // Retorna a view de listagem com uma mensagem de sucesso
        return redirect()->route('aluno.index')->with(['sucesso' => 'Aluno deletado com sucesso!']);
    }
}
