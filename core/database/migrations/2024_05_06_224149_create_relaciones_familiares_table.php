<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionesFamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relaciones_familiares', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('frecuencia')->nullable()->default(0)->comment('0. poco frecuente\n1. frecuente');
            $table->string('nivel_estudio', 100)->nullable();
            $table->string('tiempo_compartido', 45)->nullable();
            $table->foreignId('parentesco_id')->constrained('parentescos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('relaciones_familiares');
    }
}
