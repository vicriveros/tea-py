<?php

namespace App\Livewire\Persona;

use App\Models\Persona;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    // Publicar variables a ser usadas en el form
    public Persona $persona;

    #[Validate] // Agrega validacion al input. Corre lo que esta en la funcion rules, for realtime validation
    public $nombre = '';
    #[Validate]
    public $apellido ='';
    #[Validate]
    public $documento ='';
    public $id ='';


    public $message = false;

    // Asignar valor a las variables
    public function mount($id){
        $this->persona = Persona::find($id);

        $this->id = $id;
        $this->nombre = $this->persona->nombre;
        $this->apellido = $this->persona->apellido;
        $this->documento = $this->persona->documento;
    }

    public function rules(){
        return [
            'nombre' => ['required'],
            'apellido' => ['required'],
            'documento' => ['required'],
        ];
    }

    public function update(){
        $this->validate(); //ejecuta funcion rules

        $this->persona->nombre = $this->nombre;
        $this->persona->apellido = $this->apellido;
        $this->persona->documento = $this->documento;

        $this->persona->save();

        sleep(1);
        $this->message = true;
    }

    public function delete(Persona $persona){
        $persona->delete();
        $this->redirect('/persona/lista');
    }

    public function render()
    {
        return view('livewire.persona.edit', ['roles' => Role::all()]);
    }
}
