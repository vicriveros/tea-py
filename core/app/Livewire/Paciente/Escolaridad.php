<?php

namespace App\Livewire\Paciente;

use Livewire\Component;
use App\Models\Escolaridades;
use App\Models\Paciente;

class Escolaridad extends Component
{
    public Paciente $paciente;
    public Escolaridades $escolaridad;

    public $maternal_jardin = '';
    public $maternal_jardin_edad = '';
    public $maternal_jardin_sentir = '';
    public $prescolar = '';
    public $prescolar_edad = '';
    public $prescolar_sentir = '';
    public $cond_nivel_inicial = '';
    public $cond_nivel_inicial_desc = '';  
    public $cond_prescolar = '';
    public $cond_prescolar_desc = '';
    public $agrada_colegio = '';
    public $agrada_compa = '';
    public $acompa_tescolar = '';
    public $acompa_tescolar_como = '';
    public $paciente_id ='';

    public $message = false;

    public function mount(Paciente $pacienteid){

        $this->paciente = $pacienteid;
        $this->paciente_id = $pacienteid->id;
        $this->escolaridad = Escolaridades::firstOrNew([
            'paciente_id' => $this->paciente_id
        ]);

        $this->maternal_jardin = '';
        $this->maternal_jardin_edad = '';
        $this->maternal_jardin_sentir = '';
        $this->prescolar = '';
        $this->prescolar_edad = '';
        $this->prescolar_sentir = '';
        $this->cond_nivel_inicial = '';
        $this->cond_nivel_inicial_desc = '';
        $this->cond_prescolar = '';
        $this->cond_prescolar_desc = '';
        $this->agrada_colegio = '';
        $this->agrada_compa = '';
        $this->acompa_tescolar = '';
        $this->acompa_tescolar_como = '';

    }

    public function rules(){
        return [
            'maternal_jardin' => 'required',
            'maternal_jardin_edad' => 'required',
            'maternal_jardin_sentir' => 'required',
            'prescolar' => 'required',
            'prescolar_edad' => 'required',
            'prescolar_sentir' => 'required',
            'cond_nivel_inicial' => 'required',
            'cond_nivel_inicial_desc' => 'required',
            'cond_prescolar' => 'required',
            'cond_prescolar_desc' => 'required',
            'agrada_colegio' => 'required',
            'agrada_compa' => 'required',
            'acompa_tescolar' => 'required',
            'acompa_tescolar_como' => 'required',

            ];
    }

    public function save(){
        $this->validate(); //ejecuta funcion rules
        
        $this->escolaridad->paciente_id = $this->paciente_id;
        $this->escolaridad->maternal_jardin = $this->maternal_jardin;
        $this->escolaridad->maternal_jardin_edad = $this->maternal_jardin_edad;
        $this->escolaridad->maternal_jardin_sentir = $this->maternal_jardin_sentir;
        $this->escolaridad->prescolar = $this->prescolar;
        $this->escolaridad->prescolar_edad = $this->prescolar_edad;
        $this->escolaridad->prescolar_sentir = $this->prescolar_sentir;
        $this->escolaridad->cond_nivel_inicial = $this->cond_nivel_inicial;
        $this->escolaridad->cond_nivel_inicial_desc = $this->cond_nivel_inicial_desc;
        $this->escolaridad->cond_prescolar = $this->cond_prescolar;
        $this->escolaridad->cond_prescolar_desc = $this->cond_prescolar_desc;
        $this->escolaridad->agrada_colegio = $this->agrada_colegio;
        $this->escolaridad->agrada_compa = $this->agrada_compa;
        $this->escolaridad->acompa_tescolar = $this->acompa_tescolar;
        $this->escolaridad->acompa_tescolar_como = $this->acompa_tescolar_como;

        $this->escolaridad->save();
        $this->message = true;

    }

    public function render()
    {
        return view('livewire.paciente.escolaridad');
    }
}
