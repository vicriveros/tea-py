<?php

namespace App\Livewire\Agendamiento;

use App\Models\Agendamientos;
use App\Models\Especialidades;
use App\Models\Medicos;
use App\Models\Paciente;
use Livewire\Component;

class CitaEditar extends Component
{
    public Agendamientos $agendamiento;
    
    public $cita_id = '';
    public $fecha = '';
    public $hora_desde = '';
    public $hora_hasta = '';
    public $obs = '';

    public $paciente = '';
    public $especialidad_nombre = '';
    public $medico_nombres = '';
    public $message = '';

    protected $listeners = ['citaSelected'];

    public function rules(){
        return [
            'hora_desde' => ['required'],
            'hora_hasta' => ['required'],
        ];
    }

    public function citaSelected($citaId){
        $this->cita_id = $citaId;
        $this->agendamiento = Agendamientos::find($citaId); 
        $this->fecha = $this->agendamiento->fecha;
        $this->hora_desde = $this->agendamiento->hora_desde;
        $this->hora_hasta = $this->agendamiento->hora_hasta;
        $this->obs = $this->agendamiento->obs;

        $this->paciente = $this->getPacienteName($this->agendamiento->paciente_id);
        $this->medico_nombres = $this->getMedicoName($this->agendamiento->medico_id);
        $this->especialidad_nombre = $this->getEspecialidadNombre($this->agendamiento->especialidad_id);
    }

    public function save_cita(){
        $this->validate(); 
        
        $this->agendamiento->hora_desde = $this->hora_desde;
        $this->agendamiento->hora_hasta = $this->hora_hasta;
        $this->agendamiento->obs = $this->obs;
        $this->agendamiento->save();
        $this->message = true;

        $ini=$this->fecha.'T'.$this->hora_desde.':00+00:00';
        $fin=$this->fecha.'T'.$this->hora_hasta.':00+00:00';
        $this->dispatch('editarCita', id:$this->agendamiento->id, ini:$ini, fin:$fin);
    }

    public function delete_cita(Agendamientos $cita){
        $this->dispatch('deleteCita', id:$cita->id);
        $cita->delete();
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
        return view('livewire.agendamiento.cita-editar');
    }
}
