<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfermedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200)->nullable();
            $table->smallInteger('tipo')->nullable()->default(1)->comment('1. generales \n2. gastrointestinales');
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
        Schema::dropIfExists('enfermedades');
    }
}
