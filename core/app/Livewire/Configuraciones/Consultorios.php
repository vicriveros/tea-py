<?php

namespace App\Livewire\Configuraciones;

use App\Models\Consultorios as ModelsConsultorios;
use Livewire\Component;
use Livewire\WithPagination;

class Consultorios extends Component
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

        ModelsConsultorios::create(
            $this->only(['nombre'])
        );
        
        $this->reset();
        $this->message = true;
    }

    public function delete(ModelsConsultorios $consul){
        $consul->delete();
    }

    public function render()
    {
        return view('livewire.configuraciones.consultorios', ['consultorios' => ModelsConsultorios::paginate(10)]);
    }
}
