<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'turma', 'professor', 'segunda_feira', 'terca_feira', 'quarta_feira', 'quinta_feira', 'sexta_feira'];
    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
