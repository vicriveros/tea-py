<?php
 
namespace App\Livewire\Paciente;

use App\Models\Paciente;
use App\Models\Persona;
use Livewire\Component;

class Edit extends Component
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

    public $colegio ='';
    public $grado ='';
    public $diag_nombres ='';
    public $diag_edad ='';
    public $diag_responsable ='';
    public $diag_datos ='';
    public $centro_programa ='';

    public $message = false;

    public function mount(Paciente $paciente){
        $this->paciente = $paciente;
        $this->colegio = $this->paciente->colegio;
        $this->grado = $this->paciente->grado;
        $this->diag_nombres = $this->paciente->diag_nombres;
        $this->diag_edad = $this->paciente->diag_edad;
        $this->diag_responsable = $this->paciente->diag_responsable;
        $this->diag_datos = $this->paciente->diag_datos;
        $this->centro_programa = $this->paciente->centro_programa;

        $this->persona = Persona::find($this->paciente->persona_id);
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

        $this->paciente->colegio = $this->colegio;
        $this->paciente->grado = $this->grado;
        $this->paciente->diag_nombres = $this->diag_nombres;
        $this->paciente->diag_edad = $this->diag_edad;
        $this->paciente->diag_responsable = $this->diag_responsable;
        $this->paciente->diag_datos = $this->diag_datos;
        $this->paciente->centro_programa = $this->centro_programa;

        $this->persona->nombre = $this->nombre;
        $this->persona->apellido = $this->apellido;
        $this->persona->documento = $this->documento;
        $this->persona->fecha_nacimiento = $this->fecha_nacimiento;
        $this->persona->direccion = $this->direccion;
        $this->persona->barrio = $this->barrio;
        $this->persona->telefono = $this->telefono;
        $this->persona->mail = $this->mail;

        $this->persona->save();
        $this->paciente->save();

        $this->message = true;

    }

    public function render()
    {
        return view('livewire.paciente.edit');
    }
}
