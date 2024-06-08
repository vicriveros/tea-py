<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha')->nullable();
            $table->string('tabla', 45)->nullable();
            $table->string('campo_clave', 45)->nullable()->comment('Campo que identifica el campo código');
            $table->string('valor_anterior', 500)->nullable();
            $table->string('valor_nuevo', 500)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('pcmade', 45)->nullable();
            $table->string('codigo_campo_clave', 45)->nullable();
            $table->string('lugar_url', 45)->nullable();
            $table->unsignedTinyInteger('tipo_operacion')->nullable()->comment('1. Nuevo, 2. Baja, 3. Modificado');
            $table->string('campo_modificado', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};
