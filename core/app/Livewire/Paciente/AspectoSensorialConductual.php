<?php

namespace App\Livewire\Paciente;

use App\Models\Aspecto;
use App\Models\Paciente;
use App\Models\PacientesAspectos;

use Livewire\Component;

class AspectoSensorialConductual extends Component
{
    public Paciente $paciente;
    public $paciente_id = '';
    public $aspecto_id = '';
    public $tipo_aspecto = '';
    
    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;
        $this->paciente_id = $this->paciente->id;
    }

    public function save_asp(){
        $asp = Aspecto::find($this->aspecto_id);
        $this->tipo_aspecto = $asp->tipo;
        PacientesAspectos::create(
            $this->only(['aspecto_id', 'paciente_id', 'tipo_aspecto'])
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
        return view('livewire.paciente.aspecto-sensorial-conductual', [
            'pa_aspectos' => PacientesAspectos::where('paciente_id', $this->paciente_id)
                                  ->whereBetween('tipo_aspecto', [4, 5])
                                  ->get(),
            'aspectos4' => Aspecto::where('tipo', 4)->get(),
            'aspectos5' => Aspecto::where('tipo', 5)->get()
        ]);
    }
}
