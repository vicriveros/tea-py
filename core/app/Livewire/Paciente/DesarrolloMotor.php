<?php

namespace App\Livewire\Paciente;

use App\Models\DesarrollosMotores;
use App\Models\Paciente;
use Livewire\Component;

class DesarrolloMotor extends Component
{
    public Paciente $paciente;
    public DesarrollosMotores $desarrolloMotor;

    public $soscabeza = '';
    public $sesento = '';
    public $gateo = '';
    public $separo = '';
    public $camino_apoyado = '';
    public $camino_solo = '';
    public $control_esfinters = '';
    public $dif_motora = '';
    public $trata_especial = '';
    public $trata_especial_tiempo = '';
    public $paciente_id ='';

    public $message = false;

    public function mount(Paciente $pacienteid){

        $this->paciente = $pacienteid;
        $this->paciente_id = $pacienteid->id;
        $this->desarrolloMotor = DesarrollosMotores::firstOrNew([
            'paciente_id' => $this->paciente_id
        ]);

        $this->soscabeza = '';
        $this->sesento = '';
        $this->gateo = '';
        $this->separo = '';
        $this->camino_apoyado = '';
        $this->camino_solo = '';
        $this->control_esfinters = '';
        $this->dif_motora = '';
        $this->trata_especial = '';
        $this->trata_especial_tiempo = '';
        
    }

    public function rules(){
        return [
            'soscabeza' => 'required',
            'sesento' => 'required',
            'gateo' => 'required',
            'separo' => 'required',
            'camino_apoyado' => 'required',
            'camino_solo' => 'required',
            'control_esfinters' => 'required',
            'dif_motora' => 'required',
            'trata_especial' => 'required',
            'trata_especial_tiempo' => 'required',
            ];
    }

    public function save(){
        $this->validate(); //ejecuta funcion rules
        
        $this->desarrolloMotor->paciente_id = $this->paciente_id;
        $this->desarrolloMotor->soscabeza = $this->soscabeza;
        $this->desarrolloMotor->sesento = $this->sesento;
        $this->desarrolloMotor->gateo = $this->gateo;
        $this->desarrolloMotor->separo = $this->separo;
        $this->desarrolloMotor->camino_apoyado = $this->camino_apoyado;
        $this->desarrolloMotor->camino_solo = $this->camino_solo;
        $this->desarrolloMotor->control_esfinters = $this->control_esfinters;
        $this->desarrolloMotor->dif_motora = $this->dif_motora;
        $this->desarrolloMotor->trata_especial = $this->trata_especial;
        $this->desarrolloMotor->trata_especial_tiempo = $this->trata_especial_tiempo;

        $this->desarrolloMotor->save();
        $this->message = true;

    }

    public function render()
    {
        return view('livewire.paciente.desarrollo-motor');
    }
}
