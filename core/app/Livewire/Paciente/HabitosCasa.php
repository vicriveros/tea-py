<?php

namespace App\Livewire\Paciente;

use App\Models\HabitosAdicionales;
use App\Models\Paciente;
use Livewire\Component;

class HabitosCasa extends Component
{
    public Paciente $paciente;
    public HabitosAdicionales $habitos;

    public $paciente_id = '';    
    public $acostar_noche = '';
    public $alter_sueno = '';
    public $duerme_tran = '';
    public $impa_dormir = '';
    public $mueve_ant_dormir = '';
    public $despierta_madru = '';
    public $despierta_madru_hora = '';
    public $despierta_hacer = '';    
    public $dirige_bano = '';
    public $coopera_hig = '';
    public $higieniza = '';
    public $desviste = '';
    public $seviste = '';
    public $panales = '';
    public $elige_ropa = '';
    public $ayuda_parte = '';
    public $define_apetito = '';
    public $cubiertos = '';
    public $comer_mano = '';
    public $tira_comida = '';
    public $juega_comida = '';
    public $hab_obs = '';

    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;
        $this->paciente_id = $this->paciente->id;
        $this->habitos = HabitosAdicionales::firstOrNew([
            'paciente_id' => $this->paciente_id
        ]);

        $this->acostar_noche = $this->habitos->acostar_noche;
        $this->alter_sueno = $this->habitos->alter_sueno;
        $this->duerme_tran = $this->habitos->duerme_tran;
        $this->impa_dormir = $this->habitos->impa_dormir;
        $this->mueve_ant_dormir = $this->habitos->mueve_ant_dormir;
        $this->despierta_madru = $this->habitos->despierta_madru;
        $this->despierta_madru_hora = $this->habitos->despierta_madru_hora;
        $this->despierta_hacer = $this->habitos->despierta_hacer;
        $this->dirige_bano = $this->habitos->dirige_bano;
        $this->coopera_hig = $this->habitos->coopera_hig;
        $this->higieniza = $this->habitos->higieniza;
        $this->desviste = $this->habitos->desviste;
        $this->seviste = $this->habitos->seviste;
        $this->panales = $this->habitos->panales;
        $this->elige_ropa = $this->habitos->elige_ropa;
        $this->ayuda_parte = $this->habitos->ayuda_parte;
        $this->define_apetito = $this->habitos->define_apetito;
        $this->cubiertos = $this->habitos->cubiertos;
        $this->comer_mano = $this->habitos->comer_mano;
        $this->tira_comida = $this->habitos->tira_comida;
        $this->juega_comida = $this->habitos->juega_comida;
        $this->hab_obs = $this->paciente->hab_obs;
    }

    public function save(){
         $this->paciente->hab_obs = $this->hab_obs;

         $this->habitos->paciente_id = $this->paciente_id;
         $this->habitos->acostar_noche = $this->acostar_noche;
         $this->habitos->alter_sueno = $this->alter_sueno;
         $this->habitos->duerme_tran = $this->duerme_tran;
         $this->habitos->impa_dormir = $this->impa_dormir;
         $this->habitos->mueve_ant_dormir = $this->mueve_ant_dormir;
         $this->habitos->despierta_madru = $this->despierta_madru;
         $this->habitos->despierta_madru_hora = $this->despierta_madru_hora;
         $this->habitos->despierta_hacer = $this->despierta_hacer;
         $this->habitos->dirige_bano = $this->dirige_bano;
         $this->habitos->coopera_hig = $this->coopera_hig;
         $this->habitos->higieniza = $this->higieniza;
         $this->habitos->desviste = $this->desviste;
         $this->habitos->seviste = $this->seviste;
         $this->habitos->panales = $this->panales;
         $this->habitos->elige_ropa = $this->elige_ropa;
         $this->habitos->ayuda_parte = $this->ayuda_parte;
         $this->habitos->define_apetito = $this->define_apetito;
         $this->habitos->cubiertos = $this->cubiertos;
         $this->habitos->comer_mano = $this->comer_mano;
         $this->habitos->tira_comida = $this->tira_comida;
         $this->habitos->juega_comida = $this->juega_comida;

        $this->paciente->save();
        $this->habitos->save();
        $this->message = true;
    }

    public function render()
    {
        return view('livewire.paciente.habitos-casa');
    }
}
