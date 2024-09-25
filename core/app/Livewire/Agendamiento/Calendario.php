<?php

namespace App\Livewire\Agendamiento;

use App\Models\Especialidades;
use App\Models\Medicos;
use App\Models\MedicosEspecialidades;
use Livewire\Component;

class Calendario extends Component
{
    public $consultorioid = '';
    public $medicos_espe = [];

    public function mount($consultorio){
        $this->consultorioid = $consultorio;

        $especialidades_ = Especialidades::all();
        foreach($especialidades_ as $esp){
            $medicos = MedicosEspecialidades::where('especialidad_id', '=', $esp->id)->get();
            $profe=[];
            foreach($medicos as $med){
                $ch=[
                    "id" => $med->medico_id, 
                    "title" => $this->getMedicoName($med->medico_id)
                    ];
                array_push($profe, $ch);
            }
            $item=[ 
                "id" => $esp->id,
                "title"=> $esp->nombre,
                "children" => $profe
                ];
            array_push($this->medicos_espe, $item);
        }
    }

    public function getMedicoName($id){
        $med = Medicos::with('persona')->find($id);
        return $med->persona->nombre.' '.$med->persona->apellido; 
    }

    public function render()
    {
        return view('livewire.agendamiento.calendario');
    }
}
