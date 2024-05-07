<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('documento')->nullable();
            $table->string('direccion', 300)->nullable();
            $table->string('celular', 50)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('barrio', 100);
            $table->string('mail', 100)->nullable();
            $table->smallInteger('estado')->nullable()->default(1);
            $table->smallInteger('activo')->nullable()->default(1);
            $table->timestamps();

            $table->index(['nombre', 'apellido']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
