<?php

namespace App\Livewire\Medico;

use App\Models\Medicos;
use App\Models\Persona;
use Livewire\Component;

class Edit extends Component
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
    public $registro ='';

    public $message = false;
    
    public function mount(Medicos $medico){
        $this->medico = $medico;
        $this->registro = $this->medico->registro;

        $this->persona = Persona::find($this->medico->persona_id);
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

    public function save(){
        $this->validate(); 

        $this->medico->registro = $this->registro;

        $this->persona->nombre = $this->nombre;
        $this->persona->apellido = $this->apellido;
        $this->persona->documento = $this->documento;
        $this->persona->fecha_nacimiento = $this->fecha_nacimiento;
        $this->persona->direccion = $this->direccion;
        $this->persona->barrio = $this->barrio;
        $this->persona->telefono = $this->telefono;
        $this->persona->mail = $this->mail;

        $this->persona->save();
        $this->medico->save();

        $this->message = true;

    }

    public function render()
    {
        return view('livewire.medico.edit');
    }
}
