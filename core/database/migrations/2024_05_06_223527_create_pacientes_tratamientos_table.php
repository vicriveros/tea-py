<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_tratamientos', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('respuesta')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('fecha_eval', 50)->nullable();
            $table->string('nombre_medico', 200)->nullable();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tratamiento_id')->constrained('tratamientos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pacientes_tratamientos');
    }
}
