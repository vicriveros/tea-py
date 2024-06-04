<?php

namespace App\Livewire\Configuraciones;

use App\Models\Tratamiento;
use Livewire\Component;
use Livewire\WithPagination;

class Tratamientos extends Component
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

        Tratamiento::create(
            $this->only(['nombre'])
        );
        
        $this->reset();
        $this->message = true;
    }

    public function delete(Tratamiento $trata){
        $trata->delete();
    }

    public function render()
    {
        return view('livewire.configuraciones.tratamientos', [
            'tratamientos' => Tratamiento::paginate(10)
        ]);
    }
}
