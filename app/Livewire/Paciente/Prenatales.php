<?php

namespace App\Livewire\Paciente;

use App\Models\Paciente;
use App\Models\Partos;
use Livewire\Component;

class Prenatales extends Component
{
    public Paciente $paciente;
    public $prenatal_plani = '';
    public $prenatal_enfermedad = '';
    public $prenatal_enfer_nombres = '';
    public $prenatal_medicamentos = '';
    public $prenatal_med_nombres = '';
    public $prenatal_madre_edad = '';
    public $paciente_id = '';
    public $nombres = '';

    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;

        $this->paciente_id = $this->paciente->id;
        $this->prenatal_plani = $this->paciente->prenatal_plani;
        $this->prenatal_enfermedad = $this->paciente->prenatal_enfermedad;
        $this->prenatal_enfer_nombres = $this->paciente->prenatal_enfer_nombres;
        $this->prenatal_medicamentos = $this->paciente->prenatal_medicamentos;
        $this->prenatal_med_nombres = $this->paciente->prenatal_med_nombres;
        $this->prenatal_madre_edad = $this->paciente->prenatal_madre_edad;
    }

    public function save(){
        $this->paciente->prenatal_plani = $this->prenatal_plani;
        $this->paciente->prenatal_enfermedad = $this->prenatal_enfermedad;
        $this->paciente->prenatal_enfer_nombres = $this->prenatal_enfer_nombres;
        $this->paciente->prenatal_medicamentos = $this->prenatal_medicamentos;
        $this->paciente->prenatal_med_nombres = $this->prenatal_med_nombres;
        $this->paciente->prenatal_madre_edad = $this->prenatal_madre_edad;

        $this->paciente->save();
        $this->message = true;
    }

    public function save_parto(){

        Partos::create(
            $this->only(['nombres', 'paciente_id'])
        );

        $this->message = true;
    }

    public function delete_parto(Partos $parto){
        $parto->delete();
    }

    public function render()
    {
        return view('livewire.paciente.prenatales', ['partos' => Partos::all()]);
    }
}
