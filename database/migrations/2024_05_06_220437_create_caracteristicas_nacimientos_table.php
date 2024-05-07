<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicasNacimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_nacimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo')->nullable()->default(0)->comment('0. cero\n1. uno\n2. dos');
            $table->string('nombre', 200)->nullable();
            $table->smallInteger('respuesta')->nullable()->default(0)->comment('0. no\n1. si');
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
        Schema::dropIfExists('caracteristicas_nacimientos');
    }
}
