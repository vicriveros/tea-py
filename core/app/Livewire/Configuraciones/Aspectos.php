<?php

namespace App\Livewire\Configuraciones;

use App\Models\Aspecto;
use Livewire\Component;
use Livewire\WithPagination;

class Aspectos extends Component
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

        Aspecto::create(
            $this->only(['nombre'])
        );
        
        $this->reset();
        $this->message = true;
    }

    public function delete(Aspecto $asp){
        $asp->delete();
    }

    public function render()
    {
        return view('livewire.configuraciones.aspectos', [
            'aspectos' => Aspecto::paginate(10)
        ]);
    }
}
