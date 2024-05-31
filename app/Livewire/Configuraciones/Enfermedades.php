<?php

namespace App\Livewire\Configuraciones;

use App\Models\Enfermedades as ModelsEnfermedades;
use Livewire\Component;

class Enfermedades extends Component
{
    public $nombre = '';
    public $message = false;

    public function rules(){
        return [
            'nombre' => ['required'],
        ];
    }

    public function save(){
        $this->validate(); //ejecuta funcion rules

        ModelsEnfermedades::create(
            $this->only(['nombre'])
        );
        
        $this->reset();
        $this->message = true;
    }

    public function delete(ModelsEnfermedades $enfer){
        $enfer->delete();
    }

    public function render()
    {
        return view('livewire.configuraciones.enfermedades', ['enfermedades' => ModelsEnfermedades::all()]);
    }
}
