<?php

namespace App\Livewire\Paciente;

use Livewire\Component;
use App\Models\Paciente;
use App\Models\ActividadesRecreativas;

class ActividadRecreativa extends Component
{
    public Paciente $paciente;
    public ActividadesRecreativas $actividadRecreativa;

    public $paciente_id = '';
    public $hora_actividad = '';
    public $actividad_prefe = '';
    public $que_juega = '';
    public $como_juega = '';
    public $actividad_proge = '';
    public $deporte = '';
    public $deporte_cual= '';
    public $deporte_donde= '';  
    
    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;
        $this->paciente_id = $this->paciente->id;
        $this->actividadRecreativa = ActividadesRecreativas::firstOrNew([
            'paciente_id' => $this->paciente_id
        ]);

        $this->hora_actividad = $this->actividadRecreativa->hora_actividad;
        $this->actividad_prefe = $this->actividadRecreativa->actividad_prefe;
        $this->que_juega = $this->actividadRecreativa->que_juega;
        $this->como_juega = $this->actividadRecreativa->como_juega;
        $this->actividad_proge = $this->actividadRecreativa->actividad_proge;
        $this->deporte = $this->actividadRecreativa->deporte;
        $this->deporte_cual = $this->actividadRecreativa->deporte_cual;
        $this->deporte_donde = $this->actividadRecreativa->deporte_donde;


    }

    public function rules(){
        return [
            'hora_actividad' => ['required'],
            'actividad_prefe' => ['required'],
            'que_juega' => ['required'],
            'como_juega' => ['required'],
            'actividad_proge' => ['required'],
            'deporte' => ['required'],
            'deporte_cual' => ['required'],
            'deporte_donde' => ['required'],
        ];
    }

    public function save(){
        $this->validate(); //ejecuta funcion rules

        $this->actividadRecreativa->paciente_id = $this->paciente_id;
        $this->actividadRecreativa->hora_actividad = $this->hora_actividad;
        $this->actividadRecreativa->actividad_prefe = $this->actividad_prefe;
        $this->actividadRecreativa->que_juega = $this->que_juega;
        $this->actividadRecreativa->como_juega = $this->como_juega;
        $this->actividadRecreativa->actividad_proge = $this->actividad_proge;
        $this->actividadRecreativa->deporte = $this->deporte;
        $this->actividadRecreativa->deporte_cual = $this->deporte_cual;
        $this->actividadRecreativa->deporte_donde = $this->deporte_donde;
          
        $this->actividadRecreativa->save();
        $this->message = true;

    }

    public function render()
    {
        return view('livewire.paciente.actividad-recreativa');
    }
}
