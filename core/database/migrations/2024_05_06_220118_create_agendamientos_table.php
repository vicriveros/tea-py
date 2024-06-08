<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamientos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->string('hora_desde', 10)->nullable();
            $table->string('hora_hasta', 10)->nullable();
            $table->foreignId('medico_id')->constrained('medicos');
            $table->foreignId('especialidad_id')->constrained('especialidades');
            $table->foreignId('paciente_id')->constrained('pacientes');
            $table->foreignId('consultorio_id')->constrained('consultorios');
            $table->string('obs', 500)->nullable();
            $table->smallInteger('estado')->nullable()->default(1)->comment('0. Cancelada\n1. Agendamiento Activo\n2. Confirmado.\n3. Paciente Presente.');
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
        Schema::dropIfExists('agendamientos');
    }
}
