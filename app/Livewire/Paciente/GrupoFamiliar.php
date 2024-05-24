<?php

namespace App\Livewire\Paciente;

use App\Models\PacientesGruposFamiliares;
use App\Models\Parentesco;
use App\Models\Persona;
use Livewire\Component;

class GrupoFamiliar extends Component
{
    public Persona $persona;

    public $nombre = '';
    public $apellido ='';
    public $documento ='';
    public $fecha_nacimiento ='';
    public $parentesco_id ='';

    public $paciente_id ='';
    public $persona_id ='';

    public $message = false;

    // Asignar valor a las variables
    public function mount(Persona $persona, $paciente){
        $this->persona = $persona;
        $this->paciente_id = $paciente;

        $this->nombre = $this->persona->nombre;
        $this->apellido = $this->persona->apellido;
        $this->documento = $this->persona->documento;
        $this->fecha_nacimiento = $this->persona->fecha_nacimiento;
        
    }

    public function rules(){
        return [
            'nombre' => ['required'],
            'apellido' => ['required'],
        ];
    }

    public function save(){
        $this->validate(); //ejecuta funcion rules

        $new_persona= Persona::create(
            $this->only(['nombre', 'apellido', 'documento', 'fecha_nacimiento'])
        );
        $this->persona_id = $new_persona->id;

        PacientesGruposFamiliares::create(
            $this->only(['parentesco_id', 'paciente_id', 'persona_id'])
        );

        $this->message = true;
    }

    public function delete(PacientesGruposFamiliares $gfam){
        $gfam->delete();
    }

    public static function getParentescoName($id){
        $paren = Parentesco::find($id);
        return $paren->nombre;    
    }

    public static function getPersonaName($id){
        $per = Persona::find($id);
        return $per->nombre. ' '. $per->apellido;    
    }

    public function render()
    {
        return view('livewire.paciente.grupo-familiar', ['parentesco' => Parentesco::all(), 'grupo_fam' => PacientesGruposFamiliares::all()]);
    }
}
