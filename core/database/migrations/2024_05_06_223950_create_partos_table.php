<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partos', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('tipo')->nullable()->default(0)->comment('1. rapido\n2. lento\n3. normal\n4. inducido\n5. forceps');
            $table->string('nombres', 200)->nullable();
            $table->smallInteger('respuesta')->nullable()->default(0)->comment('0. no\n1. si');
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
        Schema::dropIfExists('partos');
    }
}
