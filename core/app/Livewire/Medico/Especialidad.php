<?php

namespace App\Livewire\Medico;

use App\Models\Medicos;
use App\Models\Especialidades;
use App\Models\MedicosEspecialidades;

use Livewire\Component;

class Especialidad extends Component
{
    public Medicos $medico;
    public $medico_id = '';
    public $especialidad_id = '';
    
    public $message = false;

    public function mount(Medicos $medicoid){
        $this->medico = $medicoid;

        $this->medico_id = $this->medico->id;
    }

    public function save_espe(){

        MedicosEspecialidades::create(
            $this->only(['medico_id', 'especialidad_id'])
        );

        $this->message = true;
    }

    public function delete_espe(MedicosEspecialidades $espe){
        $espe->delete();
    }

    public static function getEspecialidadesName($id){
        $espe = Especialidades::find($id);
        return $espe->nombre;    
    }

    public function render()
    {
        return view('livewire.medico.especialidad', [
            'me_especialidades' => MedicosEspecialidades::where('medico_id', $this->medico_id)->get(),
            'especialidades' => Especialidades::all()
        ]);
    }
}
