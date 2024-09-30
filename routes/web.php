<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AutenticarAdmin;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('/aluno', App\Http\Controllers\AlunoController::class)->middleware(AutenticarAdmin::class);
Route::resource('/professor', App\Http\Controllers\ProfessorController::class)->middleware(AutenticarAdmin::class);
Route::resource('/curso', App\Http\Controllers\CursoController::class)->middleware(AutenticarAdmin::class);
Route::resource('/disciplina', App\Http\Controllers\DisciplinaController::class)->middleware(AutenticarAdmin::class);
Route::resource('/turma', App\Http\Controllers\TurmaController::class)->middleware(AutenticarAdmin::class);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'verificar'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
