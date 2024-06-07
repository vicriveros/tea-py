<?php

namespace App\Livewire\Paciente;

use App\Models\Aspecto;
use App\Models\Paciente;
use App\Models\PacientesAspectos;
use Livewire\Component;

class Personalidad extends Component
{
    public Paciente $paciente;
    public $paciente_id = '';
    public $aspecto_id = '';
    
    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;
        $this->paciente_id = $this->paciente->id;
    }

    public function save_asp(){

        PacientesAspectos::create(
            $this->only(['aspecto_id', 'paciente_id'])
        );

        $this->message = true;
    }

    public function delete_asp(PacientesAspectos $trata){
        $trata->delete();
    }

    public static function getAspectoName($id){
        $asp = Aspecto::find($id);
        return $asp->nombre;    
    }

    public function render()
    {
        return view('livewire.paciente.personalidad', [
            'pa_aspectos' => PacientesAspectos::where('paciente_id', $this->paciente_id)->get(),
            'aspectos' => Aspecto::all()
        ]);
    }
}
