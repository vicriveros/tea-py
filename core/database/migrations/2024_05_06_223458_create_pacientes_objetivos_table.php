<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_objetivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->unsignedTinyInteger('estado')->default(0)->comment('0. Pendiente, 1. En Proceso, 2. Logrado, 3. No Logrado');
            $table->foreignId('consulta_id')->constrained('consultas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes_objetivos');
    }
}
