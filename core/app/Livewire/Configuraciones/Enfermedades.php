<?php

namespace App\Livewire\Configuraciones;

use App\Models\Enfermedades as ModelsEnfermedades;
use Livewire\Component;
use Livewire\WithPagination;

class Enfermedades extends Component
{
    use WithPagination;

    public $nombre = '';
    public $tipo = '';
    public $message = false;

    public function rules(){
        return [
            'nombre' => ['required'],
        ];
    }

    public function save(){
        $this->validate(); //ejecuta funcion rules

        ModelsEnfermedades::create(
            $this->only(['nombre', 'tipo'])
        );
        
        $this->reset();
        $this->message = true;
    }

    public function delete(ModelsEnfermedades $enfer){
        $enfer->delete();
    }

    public static function getTipo($id){
        $name='';
        switch ($id) {
            case '1':
                $name='Generales';
                break;
            
            case '2':
                $name='Gastrointestinales';
                break;

            default:
                $name='';
                break;
        }
        return $name;    
    }

    public function render()
    {
        return view('livewire.configuraciones.enfermedades', ['enfermedades' => ModelsEnfermedades::paginate(10)]);
    }
}
