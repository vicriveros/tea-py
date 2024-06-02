<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitosAdicionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitos_adicionales', function (Blueprint $table) {
            $table->id();
            $table->string('acostar_noche', 50)->nullable();
            $table->smallInteger('alter_sueno')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('duerme_tran')->nullable()->default(0)->comment('0. Intranquilo\n1. Tranquilo');
            $table->smallInteger('impa_dormir')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('mueve_ant_dormir')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('despierta_madru')->nullable()->default(0)->comment('0. no\n1. si');
            $table->string('despierta_madru_hora', 50)->nullable();
            $table->string('despierta_hacer', 300)->nullable();
            $table->smallInteger('dirige_bano')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('coopera_hig')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('higieniza')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('desviste')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('seviste')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('panales')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('elige_ropa')->nullable()->default(0);
            $table->smallInteger('ayuda_parte')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('define_apetito')->nullable()->default(1)->comment('1. MUY APETENTE\n2. APETENTE\n3. INAPETENTE');
            $table->smallInteger('cubiertos')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('comer_mano')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('tira_comida')->nullable()->default(0)->comment('0. no\n1. si');
            $table->smallInteger('juega_comida')->nullable()->default(0)->comment('0. no\n1. si');
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
        Schema::dropIfExists('habitos_adicionales');
    }
}
