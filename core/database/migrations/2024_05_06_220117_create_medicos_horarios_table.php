<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos_horarios', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('dia')->nullable()->comment('0. Domingo\n1. Lunes\n2. Martes\n3. Miércoles\n4. Jueves\n5. Viernes\n6. Sábado');
            $table->string('hora_desde', 10)->nullable()->comment('Horario de inicio de consulta');
            $table->string('hora_hasta', 10)->nullable()->comment('Horario de final de consulta');
            $table->smallInteger('activo')->default(1)->comment('1. Horario actual\n0. Horario inactivo');
            $table->foreignId('medico_id')->constrained('medicos');
            $table->foreignId('especialidad_id')->constrained('especialidades');
            $table->foreignId('consultorio_id')->constrained('consultorios');
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
        Schema::dropIfExists('medicos_horarios');
    }
}
