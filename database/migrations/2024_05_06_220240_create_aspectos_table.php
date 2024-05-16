<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 300)->nullable();
            $table->smallInteger('tipo')->nullable()->default(1)->comment('1. aspectos emocionales\n2. aspectos sociales\n3. aspectos habilidades sociales');
            $table->smallInteger('estado')->nullable()->default(1);
            $table->smallInteger('activo')->nullable()->default(1);
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
        Schema::dropIfExists('aspectos');
    }
}
