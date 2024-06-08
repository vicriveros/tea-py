<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('obs', 500)->nullable();
            $table->dateTime('fecha')->nullable();
            $table->foreignId('medico_id')->constrained('medicos');
            $table->foreignId('paciente_id')->constrained('pacientes');
            $table->foreignId('especialidad_id')->constrained('especialidades');
            $table->foreignId('consultorio_id')->constrained('consultorios');
            $table->foreignId('agendamiento_id')->constrained('agendamientos');
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
        Schema::dropIfExists('consultas');
    }
}
