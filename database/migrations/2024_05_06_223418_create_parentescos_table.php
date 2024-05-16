<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentescosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentescos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200)->nullable()->comment('Madre\nPadre\nAbuelo/a\nHermano/a\nTio/a\nPrimo/a\nPersonal de servicio');
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
        Schema::dropIfExists('parentescos');
    }
}
