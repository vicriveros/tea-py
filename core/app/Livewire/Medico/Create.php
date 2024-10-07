<?php

namespace App\Livewire\Medico;

use Livewire\Component;
use App\Models\Medicos;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public Medicos $medico;
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
    public $registro ='';

    public $message = false;
    public $message_error = false;
    
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

        // Buscar si la persona ya tiene usuario
        $existing_usuario = User::where('email', $this->mail)->first();
        if($existing_usuario){
            $this->user_id = $existing_usuario->id;
        }else{
            $this->message_error = true;
            return;
        }
        
        // Buscar si la persona ya existe
        $existing_persona = Persona::where('documento', $this->documento)->first();

        if ($existing_persona) {
            // Si la persona existe, usar el ID de esa persona
            $this->persona_id = $existing_persona->id;
        } else {
            // Si la persona no existe, crear una nueva
            $new_persona = Persona::create(
                $this->only(['nombre', 'apellido', 'documento', 'fecha_nacimiento', 'direccion', 'barrio', 'telefono', 'mail'])
            );
            $this->persona_id = $new_persona->id;
        }
        
        $new_medico= Medicos::create(
            $this->only(['persona_id', 'registro', 'user_id'])
        );

        $this->message = true;

        redirect()->route('profesional.edit',['medico'=>$new_medico->id]);
    }

    public function render()
    {
        return view('livewire.medico.create');
    }
}
