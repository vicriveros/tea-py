<?php

namespace App\Livewire\Configuraciones;

use App\Models\Conductas as ModelsConductas;
use Livewire\Component;
use Livewire\WithPagination;

class Conductas extends Component
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

        ModelsConductas::create(
            $this->only(['nombre', 'tipo'])
        );
        
        $this->reset();
        $this->message = true;
    }

    public function delete(ModelsConductas $cond){
        $cond->delete();
    }

    public static function getTipo($id){
        $name='';
        switch ($id) {
            case '1':
                $name='Conductuales';
                break;
            
            case '2':
                $name='Emocionales';
                break;

            default:
                $name='';
                break;
        }
        return $name;    
    }

    public function render()
    {
        return view('livewire.configuraciones.conductas', [
            'conductas' => ModelsConductas::paginate(10)
        ]);
    }
}
