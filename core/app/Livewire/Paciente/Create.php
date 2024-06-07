<?php

namespace App\Livewire\Paciente;

use Livewire\Component;
use App\Models\Paciente;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public Paciente $paciente;
    public Persona $persona;

    public $nombre = '';
    public $apellido ='';
    public $documento ='';
    public $fecha_nacimiento ='';
    public $direccion ='';
    public $barrio ='';
    public $telefono ='';
    public $mail ='';
    public $persona_id ='';
    public $user_id ='';

    public $colegio ='';
    public $grado ='';
    public $diag_nombres ='';
    public $diag_edad ='';
    public $diag_responsable ='';
    public $diag_datos ='';
    public $centro_programa ='';
    public $nacionalidad_id =1;


    public $message = false;

    public function rules(){
        return [
            'nombre' => ['required'],
            'apellido' => ['required'],
            'documento' => ['required'],
            'fecha_nacimiento' => ['required'],
            'telefono' => ['required'],
            'mail' => ['required'],
        ];
    }

    public function save(){
        $this->validate(); 
        
        $new_persona= Persona::create(
            $this->only(['nombre', 'apellido', 'documento', 'fecha_nacimiento', 'direccion', 'barrio', 'telefono', 'mail'])
        );
        $this->persona_id = $new_persona->id;
        $this->user_id = Auth::id();

        $new_paciente= Paciente::create(
            $this->only(['colegio', 'grado', 'diag_nombres', 'diag_edad', 'diag_responsable', 'diag_datos', 'centro_programa', 'persona_id', 'nacionalidad_id', 'user_id'])
        );

        $this->message = true;

        redirect()->route('paciente.edit',['paciente'=>$new_paciente->id]);
    }

    public function render()
    {
        return view('livewire.paciente.create');
    }
}
