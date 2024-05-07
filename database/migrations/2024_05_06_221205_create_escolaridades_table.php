<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolaridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolaridades', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('maternal_jardin')->nullable()->default(0)->comment('0. no\n1. si');
            $table->integer('maternal_jardin_edad')->nullable();
            $table->string('maternal_jardin_sentir', 300)->nullable();
            $table->smallInteger('prescolar')->nullable()->default(0)->comment('0. no\n1. si');
            $table->integer('prescolar_edad')->nullable();
            $table->string('prescolar_sentir', 300)->nullable();
            $table->smallInteger('cond_nivel_inicial')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('cond_nivel_inicial_desc', 300)->nullable();
            $table->smallInteger('cond_prescolar')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('cond_prescolar_desc', 300)->nullable();
            $table->smallInteger('agrada_colegio')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('agrada_compa')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('acompa_tescolar')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('acompa_tescolar_como', 300)->nullable();
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
        Schema::dropIfExists('escolaridades');
    }
}
