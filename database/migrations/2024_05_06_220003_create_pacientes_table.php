<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('colegio', 200)->nullable();
            $table->string('grado', 100)->nullable();
            $table->string('diag_nombres', 500)->nullable();
            $table->string('diag_edad', 50)->nullable();
            $table->string('diag_responsable', 200)->nullable();
            $table->string('diag_datos', 200)->nullable();
            $table->string('centro_programa', 200)->nullable();
            $table->foreignId('persona_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('nacionalidad_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->smallInteger('gfam_padres_seprados')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('gfam_vive')->nullable()->default(0)->comment('0. ambos padres\n1. padre\n2. madre\n3. otros');
            $table->string('gfam_vive_otros', 50)->nullable();
            $table->smallInteger('prenatal_plani')->nullable()->default(1)->comment('0. no\n1. si');
            $table->smallInteger('prenatal_enfermedad')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('prenatal_enfer_nombres', 300)->nullable();
            $table->smallInteger('prenatal_medicamentos')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('prenatal_med_nombres', 300)->nullable();
            $table->string('prenatal_madre_edad', 50)->nullable();
            $table->string('alnacer_peso', 50)->nullable();
            $table->string('alnacer_talla', 50)->nullable();
            $table->integer('alnacer_testapgar_1')->nullable();
            $table->integer('alnacer_testapgar_5')->nullable();
            $table->string('alnacer_obs', 500)->nullable();
            $table->integer('alnacer_tiempog')->nullable();
            $table->smallInteger('alnacer_prematuro')->nullable()->default(0)->comment('0. no\n1. si\n');
            $table->integer('alnacer_prematuro_mes')->nullable();
            $table->smallInteger('alnacer_pecho')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('alnacer_pecho_tiempo', 50)->nullable();
            $table->string('alnacer_otro', 50)->nullable();
            $table->string('alnacer_otro_tiempo', 50)->nullable();
            $table->smallInteger('alnacer_biberon')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('alnacer_biberon_tiempo', 50)->nullable();
            $table->string('aspsalud_prod', 300)->nullable();
            $table->smallInteger('aspsalud_tratamed')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('aspsalud_toma', 300)->nullable();
            $table->string('aspsalud_necmed', 300)->nullable();
            $table->smallInteger('aspsalud_acci')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('aspsalud_acci_exp', 500)->nullable();
            $table->smallInteger('aspsalud_opera')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('aspsalud_opera_exp', 500)->nullable();
            $table->string('hab_obs', 1000)->nullable();
            $table->string('expectativas_hijo', 500)->nullable();
            $table->string('datos_propor', 200)->nullable();
            $table->date('falta')->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
