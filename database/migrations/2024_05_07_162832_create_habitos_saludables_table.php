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
        Schema::create('habitos_saludables', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 1000)->nullable();
            $table->smallInteger('trata_med')->default(0)->comment('0. no\n1. si');
            $table->string('trata_med_nombres', 200)->nullable();
            $table->string('trata_med_seguro', 200)->nullable();
            $table->smallInteger('toma_med')->default(0)->comment('0. no\n1. si');
            $table->smallInteger('toma_med_razon')->default(0)->comment('0. no\n1. si');
            $table->string('toma_med_nombres', 300)->nullable();
            $table->string('toma_med_dosis', 200)->nullable();
            $table->string('toma_med_frec', 300)->nullable();
            $table->string('otros_trata', 1000)->nullable();
            $table->smallInteger('otra_med')->default(0)->comment('0. no\n1. si');
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitos_saludables');
    }
};
