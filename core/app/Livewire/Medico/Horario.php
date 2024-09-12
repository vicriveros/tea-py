<?php

namespace App\Livewire\Medico;

use App\Models\Consultorios;
use App\Models\Medicos;
use App\Models\MedicosHorarios;

use Livewire\Component;

class Horario extends Component
{
    public Medicos $medico;
    public $medico_id = '';
    public $dia = '';
    public $dias = [];
    public $message = false;
    public $fecha_inicio = '';
    public $fecha_final = '';
    public $hora_desde = '';
    public $hora_hasta = '';
    public $consultorios = '';
    public $consultorio_id = '';

    public function mount(Medicos $medicoid){
        $this->medico = $medicoid;
        $this->medico_id = $this->medico->id;
        $this->consultorios = Consultorios::all();
        $this->dias = [
            1 => 'Domingo',
            2 => 'Lunes',
            3 => 'Martes',
            4 => 'Miércoles',
            5 => 'Jueves',
            6 => 'Viernes',
            7 => 'Sábado',
        ];

    }

    public function save_hora(){

        MedicosHorarios::create(
            $this->only(['consultorio_id', 'medico_id', 'dia', 'fecha_inicio', 'fecha_final', 'hora_desde', 'hora_hasta'])
        );

        $this->message = true;
    }

    public function delete_hora(MedicosHorarios $hora){
        $hora->delete();
    }

    public function getHorarios()
    {
        return MedicosHorarios::where('medico_id', $this->medico_id)->get();
    }
    
    public function getConsultorio($id)
    {
        $cons = Consultorios::find($id);
        return $cons->nombre;  
    }

    public function getDiaNombre($dia)
    {
        return $this->dias[$dia] ?? 'Día desconocido';
    }
    
    public function render()
    {
        return view('livewire.medico.horario', [
            'me_horarios' => $this->getHorarios(),
        ]);
    }
}
