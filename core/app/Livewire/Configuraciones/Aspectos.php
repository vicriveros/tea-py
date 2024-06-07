<?php

namespace App\Livewire\Configuraciones;

use App\Models\Aspecto;
use Livewire\Component;
use Livewire\WithPagination;

class Aspectos extends Component
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

        Aspecto::create(
            $this->only(['nombre', 'tipo'])
        );
        
        $this->reset();
        $this->message = true;
    }

    public function delete(Aspecto $asp){
        $asp->delete();
    }

    public static function getTipo($id){
        $name='';
        switch ($id) {
            case '1':
                $name='ASPECTOS EMOCIONALES';
                break;
            
            case '2':
                $name='ASPECTOS SOCIALES';
                break;

            case '3':
                $name='HABILIDADES SOCIALES';
                break;

            case '4':
                $name='SENSORIALES';
                break;

            case '5':
                $name='CONDUCTUALES';
                break;

            default:
                $name='';
                break;
        }
        return $name;    
    }

    public function render()
    {
        return view('livewire.configuraciones.aspectos', [
            'aspectos' => Aspecto::paginate(10)
        ]);
    }
}
