<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Area;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        Area::create(['nome' => 'Tecnologia da Informação']);
        Area::create(['nome' => 'Tecnologia da Moda']);
        Area::create(['nome' => 'Automação Industrial']);
        Area::create(['nome' => 'Metal Mecânica']);
        Area::create(['nome' => 'Biotecnologia']);
        Area::create(['nome' => 'Eletromecãnica']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
