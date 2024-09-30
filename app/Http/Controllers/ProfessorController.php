<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = Professor::all()->count();
        $professores = Professor::all();
        return view('professor.index', ['professores' => $professores, 'resultados' => $resultados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'senha' => 'required|confirmed',
            'email' => 'unique:professores'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido',
            'confirmed' => 'As senhas não coincidem',
            'unique' => 'O E-mail já está cadastrado!'
        ];

        $request->validate($regras, $feedbacks);

        $professor = new Professor();
        $professor->nome = $request->nome;
        $professor->email = $request->email;
        $professor->senha = bcrypt($request->senha);
        $professor->save();

        return redirect()->route('professor.create')->with(['sucesso' => 'Professor cadastrado com sucesso!']);
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
        $professor = Professor::find($id);
        return view('professor.edit', ['professor' => $professor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $regras = [
            'nome' => 'required',
            'senha' => 'required|confirmed'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido',
            'confirmed' => 'As senhas não coincidem'
        ];

        $request->validate($regras, $feedbacks);

        $professor = Professor::find($id);

        $professor->nome = $request->nome;
        $professor->email = $request->email;
        $professor->senha = bcrypt($request->senha);
        $professor->save();

        return redirect()->route('professor.index')->with(['sucesso' => 'Professor atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $professor = Professor::find($id);
        $professor->delete();
        return redirect()->route('professor.index')->with(['sucesso' => 'Professor deletada com sucesso']);
    }
}
