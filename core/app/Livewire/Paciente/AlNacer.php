<?php

namespace App\Livewire\Paciente;

use App\Models\Paciente;
use Livewire\Component;

class AlNacer extends Component
{
    public Paciente $paciente;
    public $paciente_id = '';    
    public $alnacer_peso = '';
    public $alnacer_talla = '';
    public $alnacer_testapgar_1 = '';
    public $alnacer_testapgar_5 = '';
    public $alnacer_obs = '';
    public $alnacer_tiempog = '';
    public $alnacer_prematuro = '';    
    public $alnacer_prematuro_mes = '';
    public $alnacer_pecho = '';
    public $alnacer_pecho_tiempo = '';
    public $alnacer_otro = '';
    public $alnacer_otro_tiempo = '';
    public $alnacer_biberon = '';
    public $alnacer_biberon_tiempo = '';

    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;

        $this->paciente_id = $this->paciente->id;
        $this->alnacer_peso = $this->paciente->alnacer_peso;
        $this->alnacer_talla = $this->paciente->alnacer_talla;
        $this->alnacer_testapgar_1 = $this->paciente->alnacer_testapgar_1;
        $this->alnacer_testapgar_5 = $this->paciente->alnacer_testapgar_5;
        $this->alnacer_obs = $this->paciente->alnacer_obs;
        $this->alnacer_tiempog = $this->paciente->alnacer_tiempog;
        $this->alnacer_prematuro = $this->paciente->alnacer_prematuro;
        $this->alnacer_prematuro_mes = $this->paciente->alnacer_prematuro_mes;
        $this->alnacer_pecho = $this->paciente->alnacer_pecho;
        $this->alnacer_pecho_tiempo = $this->paciente->alnacer_pecho_tiempo;
        $this->alnacer_otro = $this->paciente->alnacer_otro;
        $this->alnacer_otro_tiempo = $this->paciente->alnacer_otro_tiempo;
        $this->alnacer_biberon = $this->paciente->alnacer_biberon;
        $this->alnacer_biberon_tiempo = $this->paciente->alnacer_biberon_tiempo;
    }

    public function save(){
        $this->paciente->alnacer_peso = $this->alnacer_peso;
        $this->paciente->alnacer_talla = $this->alnacer_talla;
        $this->paciente->alnacer_testapgar_1 = $this->alnacer_testapgar_1;
        $this->paciente->alnacer_testapgar_5 = $this->alnacer_testapgar_5;
        $this->paciente->alnacer_obs = $this->alnacer_obs;
        $this->paciente->alnacer_tiempog = $this->alnacer_tiempog;
        $this->paciente->alnacer_prematuro = $this->alnacer_prematuro;
        $this->paciente->alnacer_prematuro_mes = $this->alnacer_prematuro_mes;
        $this->paciente->alnacer_pecho = $this->alnacer_pecho;
        $this->paciente->alnacer_pecho_tiempo = $this->alnacer_pecho_tiempo;
        $this->paciente->alnacer_otro = $this->alnacer_otro;
        $this->paciente->alnacer_otro_tiempo = $this->alnacer_otro_tiempo;
        $this->paciente->alnacer_biberon = $this->alnacer_biberon;
        $this->paciente->alnacer_biberon_tiempo = $this->alnacer_biberon_tiempo;

        $this->paciente->save();
        $this->message = true;
    }

    public function render()
    {
        return view('livewire.paciente.al-nacer');
    }
}
