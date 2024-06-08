<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesarrollosComunicacionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollos_comunicacionales', function (Blueprint $table) {
            $table->id();
            $table->string('gorgeo', 50)->nullable();
            $table->string('balbuceo', 50)->nullable();
            $table->string('sonrisa_social', 50)->nullable();
            $table->string('fija_mirada', 50)->nullable();
            $table->string('com_no', 50)->nullable();
            $table->string('prim_palabras', 50)->nullable();
            $table->string('frases2_palabras', 50)->nullable();
            $table->string('ora_completa', 50)->nullable();
            $table->string('com_ordenes', 50)->nullable();
            $table->string('cum_ordenes', 50)->nullable();
            $table->string('sis_com', 200)->nullable();
            $table->smallInteger('se_expresa')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('se_expresa_como', 500)->nullable();
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
        Schema::dropIfExists('desarrollos_comunicacionales');
    }
}
