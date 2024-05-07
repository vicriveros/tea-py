<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionesExternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relaciones_externas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 200)->nullable();
            $table->integer('edad')->nullable();
            $table->string('profesion', 100)->nullable();
            $table->smallInteger('otras_per')->nullable()->default(0)->comment('0. familiares directos\n1. otras personas que viven en el hogar');
            $table->string('nivel_estudio', 100)->nullable();
            $table->string('salud_general', 100)->nullable();
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
        Schema::dropIfExists('relaciones_externas');
    }
}
