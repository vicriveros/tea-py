<?php

namespace App\Livewire\Medico;

use App\Models\Especialidades;
use App\Models\Medicos;
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

    public function save_esp(){
        $esp = Especialidades::find($this->especialidad_id);
            MedicosEspecialidades::create(
            $this->only(['especialidad_id', 'medico_id'])
        );

        $this->message = true;
    }

    public function delete_esp(MedicosEspecialidades $espe){
        $espe->delete();
    }

    public static function getEspecialidadName($id){
        $esp = Especialidades::find($id);
        return $esp->nombre;    
    }

    public function render()
    {
        return view('livewire.medico.especialidad', [
            'me_espe' => MedicosEspecialidades::where('medico_id', $this->medico_id)
            ->get(),
            'especialidad' => Especialidades::all()

        ]);
    }
}
