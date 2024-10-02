<?php

namespace App\Livewire\Agendamiento;

use App\Models\Agendamientos;
use App\Models\Especialidades;
use App\Models\Medicos;
use App\Models\MedicosEspecialidades;
use App\Models\Paciente;
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
    
    public $especialidad_nombre = '';
    public $medico_nombres = '';
    public $message = '';

    protected $listeners = ['resultSelected', 'profSelected'];

    public function rules(){
        return [
            'consultorio_id' => ['required'],
            'especialidad_id' => ['required'],
            'medico_id' => ['required'],
            'paciente_id' => ['required'],
            'fecha' => ['required'],
            'hora_desde' => ['required'],
            'hora_hasta' => ['required'],
        ];
    }

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
        $this->validate(); 
        
        $this->fecha = date('Y-m-d', strtotime($this->fecha));
        $cita = Agendamientos::create(
            $this->only(['consultorio_id', 'especialidad_id', 'medico_id', 'paciente_id', 'fecha', 'hora_desde', 'hora_hasta', 'obs'])
        );
        $this->message = true;

        $nombre= $this->getPacienteName($this->paciente_id);
        $ini=$this->fecha.'T'.$this->hora_desde.':00+00:00';
        $fin=$this->fecha.'T'.$this->hora_hasta.':00+00:00';
        $this->dispatch('addCita', id:$cita->id, nombre:$nombre, ini:$ini, fin:$fin, resourceId:$this->medico_id);
        $this->reset();
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
    
    public function getPacienteName($id){
        $pac = Paciente::with('persona')->find($id);
        return $pac->persona->nombre.' '.$pac->persona->apellido; 
    }

    public function render()
    {
        return view('livewire.agendamiento.cita');
    }
}
