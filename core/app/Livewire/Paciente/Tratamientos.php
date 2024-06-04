<?php

namespace App\Livewire\Paciente;

use App\Models\Paciente;
use App\Models\PacientesTratamientos;
use App\Models\Tratamiento;
use Livewire\Component;

class Tratamientos extends Component
{
    public Paciente $paciente;
    public $paciente_id = '';
    public $fecha_eval = '';
    public $nombre_medico = '';
    public $tratamiento_id = '';
    
    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;
        $this->paciente_id = $this->paciente->id;
    }

    public function save_trata(){

        PacientesTratamientos::create(
            $this->only(['tratamiento_id', 'paciente_id', 'fecha_eval', 'nombre_medico'])
        );

        $this->message = true;
    }

    public function delete_trata(PacientesTratamientos $trata){
        $trata->delete();
    }

    public static function getTratamientoName($id){
        $trata = Tratamiento::find($id);
        return $trata->nombre;    
    }

    public function render()
    {
        return view('livewire.paciente.tratamientos', [
            'pa_tratamientos' => PacientesTratamientos::where('paciente_id', $this->paciente_id)->get(),
            'tratamientos' => Tratamiento::all()
        ]);
    }
}
