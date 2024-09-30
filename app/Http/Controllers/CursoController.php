<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Area;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = Curso::all()->count();
        $cursos = Curso::with('area')->get();
        return view('curso.index', ['cursos' => $cursos, 'resultados' => $resultados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        return view('curso.create', ['areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|unique:cursos',
            'area' => 'required'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'unique' => 'Curso com nome já existente.'
        ];

        $request->validate($regras, $feedbacks);

        $curso = new Curso();
        $curso->nome = $request->nome;
        $curso->area_id = $request->area;
        $curso->save();

        return redirect()->route('curso.create')->with(['sucesso' => 'Curso criado com sucesso!']);
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
        $areas = Area::all();
        $curso = Curso::find($id);
        return view('curso.edit', ['areas' => $areas, 'curso' => $curso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $regras = [
            'nome' => 'required',
            'area' => 'required'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido.',
        ];

        $request->validate($regras, $feedbacks);

        $curso = Curso::find($id);
        $curso->nome = $request->nome;
        $curso->area_id = $request->area;
        $curso->update();

        return redirect()->route('curso.index')->with(['sucesso' => 'Curso editado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        return redirect()->route('curso.index')->with('sucesso', 'Curso deletado com sucesso!');
    }
}
