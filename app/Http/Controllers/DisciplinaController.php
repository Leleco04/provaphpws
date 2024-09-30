<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Turma;
use App\Models\Professor;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = Disciplina::all()->count();
        $disciplinas = Disciplina::with('professor')->with('turma')->get();
        return view('disciplina.index', ['disciplinas' => $disciplinas, 'resultados' => $resultados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professores = Professor::all();
        $turmas = Turma::all();
        return view('disciplina.create', ['turmas' => $turmas, 'professores' => $professores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|unique:disciplinas',
            'turma' => 'required',
            'professor' => 'required'
        ];
        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'unique' => 'Disciplina com mesmo nome já cadastrada.'
        ];

        $request->validate($regras, $feedbacks);

        $disciplina = new Disciplina();
        $disciplina->nome = $request->nome;
        $disciplina->turma_id = $request->turma;
        $disciplina->professor_id = $request->professor;
        $disciplina->segunda_feira = false;
        $disciplina->terca_feira = false;
        $disciplina->quarta_feira = false;
        $disciplina->quinta_feira = false;
        $disciplina->sexta_feira = false;

        if ($request->segunda == 'on') {
            $disciplina->segunda_feira = true;
        }
        if ($request->terca == 'on') {
            $disciplina->terca_feira = true;
        }
        if ($request->quarta == 'on') {
            $disciplina->quarta_feira = true;
        }
        if ($request->quinta == 'on') {
            $disciplina->quinta_feira = true;
        }
        if ($request->sexta == 'on') {
            $disciplina->sexta_feira = true;
        }

        $disciplina->save();

        return redirect()->route('disciplina.create')->with(['sucesso' => 'Disciplina criada com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $disciplina = Disciplina::find($id);
        $professores = Professor::all();
        $turmas = Turma::all();
        return view('disciplina.edit', ['turmas' => $turmas, 'professores' => $professores, 'disciplina' => $disciplina]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'nome' => 'required',
        ];
        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido.',
        ];

        $request->validate($regras, $feedbacks);

        $disciplina = Disciplina::find($id);
        $disciplina->nome = $request->nome;
        $disciplina->turma_id = $request->turma;
        $disciplina->professor_id = $request->professor;
        $disciplina->segunda_feira = false;
        $disciplina->terca_feira = false;
        $disciplina->quarta_feira = false;
        $disciplina->quinta_feira = false;
        $disciplina->sexta_feira = false;

        if ($request->segunda == 'on') {
            $disciplina->segunda_feira = true;
        }
        if ($request->terca == 'on') {
            $disciplina->terca_feira = true;
        }
        if ($request->quarta == 'on') {
            $disciplina->quarta_feira = true;
        }
        if ($request->quinta == 'on') {
            $disciplina->quinta_feira = true;
        }
        if ($request->sexta == 'on') {
            $disciplina->sexta_feira = true;
        }

        $disciplina->update();

        return redirect()->route('disciplina.index')->with(['sucesso' => 'Disciplina atualizada com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $disciplina = Disciplina::find($id);
        $disciplina->delete();
        return redirect()->route('disciplina.index')->with(['sucesso' => 'Disciplina deletada com sucesso']);
    }
}
