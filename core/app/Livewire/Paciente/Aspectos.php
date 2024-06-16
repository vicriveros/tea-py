<?php

namespace App\Livewire\Paciente;

use App\Models\Enfermedades;
use App\Models\Paciente;
use App\Models\PacientesEnfermedades;
use Livewire\Component;

class Aspectos extends Component
{
    public Paciente $paciente;
    public $paciente_id = '';
    public $aspsalud_prod = '';
    public $aspsalud_tratamed = '';
    public $aspsalud_toma = '';
    public $aspsalud_necmed = '';
    public $aspsalud_acci = '';
    public $aspsalud_acci_exp = '';
    public $aspsalud_opera = '';
    public $aspsalud_opera_exp = '';
    public $enfermedad_id = '';
    
    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;

        $this->paciente_id = $this->paciente->id;
        $this->aspsalud_prod = $this->paciente->aspsalud_prod;
        $this->aspsalud_tratamed = $this->paciente->aspsalud_tratamed;
        $this->aspsalud_toma = $this->paciente->aspsalud_toma;
        $this->aspsalud_necmed = $this->paciente->aspsalud_necmed;
        $this->aspsalud_acci = $this->paciente->aspsalud_acci;
        $this->aspsalud_acci_exp = $this->paciente->aspsalud_acci_exp;
        $this->aspsalud_opera = $this->paciente->aspsalud_opera;
        $this->aspsalud_opera_exp = $this->paciente->aspsalud_opera_exp;
    }

    public function save(){
        $this->paciente->aspsalud_prod = $this->aspsalud_prod;
        $this->paciente->aspsalud_tratamed = $this->aspsalud_tratamed;
        $this->paciente->aspsalud_toma = $this->aspsalud_toma;
        $this->paciente->aspsalud_necmed = $this->aspsalud_necmed;
        $this->paciente->aspsalud_acci = $this->aspsalud_acci;
        $this->paciente->aspsalud_acci_exp = $this->aspsalud_acci_exp;
        $this->paciente->aspsalud_opera = $this->aspsalud_opera;
        $this->paciente->aspsalud_opera_exp = $this->aspsalud_opera_exp;

        $this->paciente->save();
        $this->message = true;
    }

    public function save_enfer(){

        PacientesEnfermedades::create(
            $this->only(['enfermedad_id', 'paciente_id'])
        );

        $this->message = true;
    }

    public function delete_enfer(PacientesEnfermedades $enfer){
        $enfer->delete();
    }

    public static function getEnfermedadesName($id){
        $enfer = Enfermedades::find($id);
        return $enfer->nombre;    
    }

    public function render()
    {
        return view('livewire.paciente.aspectos', [
            'pa_enfermedades' => PacientesEnfermedades::where('paciente_id', $this->paciente_id)->get(),
            'enfermedades' => Enfermedades::where('tipo', '1')->get()
        ]);
    }
}
