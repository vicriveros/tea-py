<?php

namespace App\Livewire\Configuraciones;

use App\Models\Especialidades as ModelsEspecialidades;
use Livewire\Component;
use Livewire\WithPagination;

class Especialidades extends Component
{
    use WithPagination;

    public $nombre = '';
    public $message = false;

    public function rules(){
        return [
            'nombre' => ['required'],
        ];
    }

    public function save(){
        $this->validate(); //ejecuta funcion rules

        ModelsEspecialidades::create(
            $this->only(['nombre'])
        );
        
        $this->reset();
        $this->message = true;
    }
    
    public function delete(ModelsEspecialidades $espe){
        $espe->delete();
    }

    public function render()
    {
        return view('livewire.configuraciones.especialidades', ['especialidades' => ModelsEspecialidades::paginate(10)]);
    }
}
