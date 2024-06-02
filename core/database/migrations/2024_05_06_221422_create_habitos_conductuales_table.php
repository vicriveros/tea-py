<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitosConductualesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitos_conductuales', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('pasado')->nullable()->default(1);
            $table->smallInteger('ahora')->nullable()->default(1);
            $table->unsignedBigInteger('conducta_id');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('conducta_id')->references('id')->on('conductas')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
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
        Schema::dropIfExists('habitos_conductuales');
    }
}
