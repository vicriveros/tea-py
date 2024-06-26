<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesAspectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_aspectos', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('tipo_aspecto')->nullable()->default(0);
            $table->foreignId('aspecto_id')->constrained('aspectos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pacientes_aspectos');
    }
}
