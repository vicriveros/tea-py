<?php

namespace App\Livewire\Agendamiento;

use App\Models\Agendamientos;
use App\Models\Consultorios;
use App\Models\Especialidades;
use App\Models\Medicos;
use Livewire\Component;

class Cita extends Component
{
    public Agendamientos $agendamiento;
    public $consultorio_id = '';
    public $especialidad_id = '';
    public $medico_id = '';
    public $paciente_id = '';
    public $fecha = '';
    public $hora_desde = '';
    public $hora_hasta = '';
    public $obs = '';
    public $estado = '';
    
    public $consultorios_ = '';
    public $especialidades_ = '';
    public $medicos_ = '';
    public $message = '';
    
    public function mount(Agendamientos $agendamientoid){
        $this->agendamiento = $agendamientoid;
        $this->consultorio_id = $this->agendamiento->consultorio_id;
        $this->especialidad_id = $this->agendamiento->especialidad_id;
        $this->medico_id = $this->agendamiento->medico_id;
        $this->paciente_id = $this->agendamiento->paciente_id;
        $this->fecha = $this->agendamiento->fecha;
        $this->hora_desde = $this->agendamiento->hora_desde;
        $this->hora_hasta = $this->agendamiento->hora_hasta;
        $this->obs = $this->agendamiento->obs;

        $this->consultorios_ = Consultorios::all();
        $this->especialidades_ = Especialidades::all();
        $this->medicos_ = Medicos::with('persona')->get();

    }

    public function save_cita(){
        $this->agendamiento->consultorio_id = $this->consultorio_id;
        $this->agendamiento->especialidad_id = $this->especialidad_id;
        $this->agendamiento->medico_id = $this->medico_id;
        $this->agendamiento->paciente_id = $this->paciente_id;
        $this->agendamiento->fecha = $this->fecha;
        $this->agendamiento->hora_desde = $this->hora_desde;
        $this->agendamiento->hora_hasta = $this->hora_hasta;
        $this->agendamiento->obs = $this->obs;

        $this->agendamiento->save();

        $this->reset();
        $this->message = true;
    }

    public function delete_cita(Agendamientos $cita){
        $cita->delete();
    }

    public function render()
    {
        return view('livewire.agendamiento.cita',[
            'consultorios' => $this->consultorios_,
            'especialidades' => $this->especialidades_,
            'medicos' => $this->medicos_,
        ]);
    }
}
