<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEspecialidadIdAndConsultorioIdFromMedicosHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicos_horarios', function (Blueprint $table) {
            // Primero eliminar la clave foránea para especialidad_id
            $table->dropForeign(['especialidad_id']);
            
            // Luego eliminar la columna especialidad_id
            $table->dropColumn('especialidad_id');
            
            // Luego eliminar la clave foránea para consultorio_id
            //$table->dropForeign(['consultorio_id']);
            
            // Finalmente, eliminar la columna consultorio_id
            //$table->dropColumn('consultorio_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicos_horarios', function (Blueprint $table) {
            // Volver a agregar las columnas
            $table->unsignedBigInteger('especialidad_id')->nullable();
            //$table->unsignedBigInteger('consultorio_id')->nullable();
            
            // Volver a agregar las claves foráneas (asegúrate de definir la tabla y columna referenciada correctamente)
            $table->foreign('especialidad_id')->references('id')->on('especialidades')->onDelete('set null');
            //$table->foreign('consultorio_id')->references('id')->on('consultorios')->onDelete('set null');
        });
    }
}
