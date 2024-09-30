<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Turma;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = Turma::all()->count();
        $turmas = Turma::with('curso')->get();
        return view('turma.index', ['turmas' => $turmas, 'resultados' => $resultados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('turma.create', ['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|unique:turmas',
            'curso' => 'required'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'unique' => 'Turma com nome já existente.'
        ];

        $request->validate($regras, $feedbacks);

        $turma = new Turma();
        $turma->nome = $request->nome;
        $turma->curso_id = $request->curso;
        $turma->save();

        return redirect()->route('turma.create')->with(['sucesso' => 'Turma criada com sucesso!']);
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
        $turma = Turma::find($id);
        $cursos = Curso::all();
        return view('turma.edit', ['turma' => $turma, 'cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $turma = Turma::find($id);
        $turma->update($request->all());
        return redirect()->route('turma.index')->with(['sucesso' => 'Turma atualizada com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $turma = Turma::find($id);
        $turma->delete();
        return redirect()->route('turma.index')->with(['sucesso' => 'Turma deletada com sucesso']);
    }
}
