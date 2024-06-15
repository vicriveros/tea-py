<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesarrollosMotoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollos_motores', function (Blueprint $table) {
            $table->id();
            $table->string('soscabeza', 50)->nullable();
            $table->string('sesento', 50)->nullable();
            $table->string('gateo', 50)->nullable();
            $table->string('separo', 50)->nullable();
            $table->string('camino_apoyado', 50)->nullable();
            $table->string('camino_solo', 50)->nullable();
            $table->string('control_esfinters', 50)->nullable();
            $table->smallInteger('dif_motora')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('trata_especial')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('trata_especial_tiempo', 50)->nullable();
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
        Schema::dropIfExists('desarrollos_motores');
    }
}
