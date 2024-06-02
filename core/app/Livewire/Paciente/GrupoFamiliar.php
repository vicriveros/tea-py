<?php

namespace App\Livewire\Paciente;

use App\Models\Paciente;
use App\Models\PacientesGruposFamiliares;
use App\Models\Parentesco;
use App\Models\Persona;
use Livewire\Component;

class GrupoFamiliar extends Component
{
    public Persona $persona;
    public Paciente $paciente;

    public $nombre = '';
    public $apellido ='';
    public $documento ='';
    public $fecha_nacimiento ='';
    public $parentesco_id ='';
    public $persona_id ='';
    
    public $gfam_padres_seprados ='';
    public $gfam_vive ='';
    public $gfam_vive_otros ='';
    public $paciente_id ='';

    public $message = false;

    // Asignar valor a las variables
    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;

        $this->paciente_id = $this->paciente->id;
        $this->gfam_padres_seprados = $this->paciente->gfam_padres_seprados;
        $this->gfam_vive = $this->paciente->gfam_vive;
        $this->gfam_vive_otros = $this->paciente->gfam_vive_otros;
    }

    public function rules(){
        return [
            'nombre' => ['required'],
            'apellido' => ['required'],
            'parentesco_id' => ['required'],
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

    public function save_general(){
        $this->paciente->gfam_padres_seprados = $this->gfam_padres_seprados;
        $this->paciente->gfam_vive = $this->gfam_vive;
        $this->paciente->gfam_vive_otros = $this->gfam_vive_otros;

        $this->paciente->save();
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
        return view('livewire.paciente.grupo-familiar', [
            'parentesco' => Parentesco::all(), 
            'grupo_fam' => PacientesGruposFamiliares::where('paciente_id', $this->paciente_id)->get()
        ]);
    }
}
