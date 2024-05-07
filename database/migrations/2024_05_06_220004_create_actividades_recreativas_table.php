<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesRecreativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_recreativas', function (Blueprint $table) {
            $table->id();
            $table->string('hora_actividad', 50)->nullable();
            $table->string('actividad_prefe', 300)->nullable();
            $table->string('que_juega', 300)->nullable();
            $table->string('como_juega', 300)->nullable();
            $table->string('actividad_proge', 300)->nullable();
            $table->smallInteger('deporte')->nullable()->default(0);
            $table->string('deporte_cual', 300)->nullable();
            $table->string('deporte_donde', 300)->nullable();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('actividades_recreativas');
    }
}
