<?php

namespace App\Livewire\Agendamiento;

use App\Models\Agendamientos;
use App\Models\Especialidades;
use App\Models\Medicos;
use App\Models\MedicosEspecialidades;
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
    public $profesional = '';
    
    public $consultorios_ = '';
    public $especialidad_nombre = '';
    public $medico_nombres = '';
    public $message = '';

    protected $listeners = ['resultSelected', 'profSelected'];

    // This method gets triggered when the event is fired
    public function resultSelected($paciente_seleccionado){
        $this->paciente_id = $paciente_seleccionado; 
    }

    public function profSelected($profesional, $fecha, $hora){
        $this->fecha = $fecha;
        $this->hora_desde = $hora;
        $this->hora_hasta = date('H:i', strtotime($hora . ' +45 minutes'));
        $this->medico_id = $profesional;
        $this->medico_nombres = $this->getMedicoName($this->medico_id);
        $this->especialidad_id = $this->getEspecialidadId($this->medico_id);
        $this->especialidad_nombre = $this->getEspecialidadNombre($this->especialidad_id);
    }
    
    public function mount(Agendamientos $agendamientoid, $consultorio){
        $this->agendamiento = $agendamientoid;
        $this->consultorio_id = $consultorio;
    }

    public function save_cita(){
        $this->agendamiento->consultorio_id = $this->consultorio_id;
        $this->agendamiento->especialidad_id = $this->especialidad_id;
        $this->agendamiento->medico_id = $this->medico_id;
        $this->agendamiento->paciente_id = $this->paciente_id;
        $this->agendamiento->fecha = date('Y-m-d', strtotime($this->fecha));
        $this->agendamiento->hora_desde = $this->hora_desde;
        $this->agendamiento->hora_hasta = $this->hora_hasta;
        $this->agendamiento->obs = $this->obs;

        $this->agendamiento->save();

        $this->reset();
        $this->message = true;
    }

    public function getEspecialidadId($id){
        $esp = MedicosEspecialidades::where('medico_id', '=', $id)->get();
        return $esp[0]->especialidad_id; 
    }

    public function getEspecialidadNombre($id){
        $esp_nombre = Especialidades::find($id);
        return $esp_nombre->nombre; 
    }

    public function getMedicoName($id){
        $med = Medicos::with('persona')->find($id);
        return $med->persona->nombre.' '.$med->persona->apellido; 
    }
    

    public function render()
    {
        return view('livewire.agendamiento.cita');
    }
}
