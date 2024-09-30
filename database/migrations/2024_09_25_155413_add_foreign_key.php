<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
        });

        Schema::table('disciplinas', function (Blueprint $table) {
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('professores')->onDelete('cascade');
        });

        Schema::table('cursos', function (Blueprint $table) {
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });

        Schema::table('turmas', function (Blueprint $table) {
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->dropForeign(['turma_id']);
        });
        Schema::table('disciplinas', function (Blueprint $table) {
            $table->dropForeign(['turma_id']);
            $table->dropForeign(['professor_id']);
        });
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['area_id']);
        });
        Schema::table('turmas', function (Blueprint $table) {
            $table->dropForeign(['curso_id']);
        });
    }
};
