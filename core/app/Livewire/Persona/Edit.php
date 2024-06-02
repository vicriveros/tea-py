<?php

namespace App\Livewire\Persona;

use App\Models\Persona;
use Livewire\Component;

class Edit extends Component
{
    // Publicar variables a ser usadas en el form
    public Persona $persona;

    public $nombre = '';
    public $apellido ='';
    public $documento ='';
    public $fecha_nacimiento ='';
    public $direccion ='';
    public $barrio ='';
    public $telefono ='';
    public $mail ='';
    public $id ='';


    public $message = false;

    // Asignar valor a las variables
    public function mount(Persona $persona){
        $this->persona = $persona;

        $this->id = $this->persona->id;
        $this->nombre = $this->persona->nombre;
        $this->apellido = $this->persona->apellido;
        $this->documento = $this->persona->documento;
        $this->fecha_nacimiento = $this->persona->fecha_nacimiento;
        $this->direccion = $this->persona->direccion;
        $this->barrio = $this->persona->barrio;
        $this->telefono = $this->persona->telefono;
        $this->mail = $this->persona->mail;
        
    }

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

    public function update(){
        $this->validate(); //ejecuta funcion rules

        $this->persona->nombre = $this->nombre;
        $this->persona->apellido = $this->apellido;
        $this->persona->documento = $this->documento;
        $this->persona->fecha_nacimiento = $this->fecha_nacimiento;
        $this->persona->direccion = $this->direccion;
        $this->persona->barrio = $this->barrio;
        $this->persona->telefono = $this->telefono;
        $this->persona->mail = $this->mail;

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
        return view('livewire.persona.edit');
    }
}
