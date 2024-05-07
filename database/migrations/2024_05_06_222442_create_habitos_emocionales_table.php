<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitosEmocionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitos_emocionales', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('presenta')->default(0);
            $table->string('presenta_emo', 500)->nullable();
            $table->foreignId('conducta_id')->constrained('conductas');
            $table->foreignId('paciente_id')->constrained('pacientes');
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
        Schema::dropIfExists('habitos_emocionales');
    }
}
