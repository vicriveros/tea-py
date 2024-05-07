<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitosAlimenticiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitos_alimenticios', function (Blueprint $table) {
            $table->id();
            $table->string('desayuno', 300)->nullable();
            $table->string('media_manana', 300)->nullable();
            $table->string('almuerzo', 300)->nullable();
            $table->string('merienda', 300)->nullable();
            $table->string('cena', 300)->nullable();
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
        Schema::dropIfExists('habitos_alimenticios');
    }
}
