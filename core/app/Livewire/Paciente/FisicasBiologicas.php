<?php

namespace App\Livewire\Paciente;

use App\Models\Enfermedades;
use App\Models\HabitosAlimenticios;
use App\Models\HabitosBiologicos;
use App\Models\HabitosSaludables;
use App\Models\Paciente;
use Livewire\Component;

class FisicasBiologicas extends Component
{
    public Paciente $paciente;
    public HabitosAlimenticios $alimenticios;
    public HabitosSaludables $saludables;

    public $paciente_id = '';
    public $enfermedad_id = '';

    public $desayuno = '';
    public $media_manana = '';
    public $almuerzo = '';
    public $merienda = '';
    public $cena = '';

    public $descripcion = '';
    public $trata_med = '';
    public $trata_med_nombres = '';
    public $trata_med_seguro = '';
    public $toma_med = '';    
    public $toma_med_razon = '';
    public $toma_med_nombres = '';
    public $toma_med_dosis = '';
    public $toma_med_frec = '';
    public $otros_trata = '';
    public $otra_med = '';

    
    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;
        $this->paciente_id = $this->paciente->id;

        $this->alimenticios = HabitosAlimenticios::firstOrNew([
            'paciente_id' => $this->paciente_id
        ]);
        $this->desayuno = $this->alimenticios->desayuno;
        $this->media_manana = $this->alimenticios->media_manana;
        $this->almuerzo = $this->alimenticios->almuerzo;
        $this->merienda = $this->alimenticios->merienda;
        $this->cena = $this->alimenticios->cena;

        $this->saludables = HabitosSaludables::firstOrNew([
            'paciente_id' => $this->paciente_id
        ]);
        $this->descripcion = $this->saludables->descripcion;
        $this->trata_med = $this->saludables->trata_med;
        $this->trata_med_nombres = $this->saludables->trata_med_nombres;
        $this->trata_med_seguro = $this->saludables->trata_med_seguro;
        $this->toma_med = $this->saludables->toma_med;
        $this->toma_med_razon = $this->saludables->toma_med_razon;
        $this->toma_med_nombres = $this->saludables->toma_med_nombres;
        $this->toma_med_dosis = $this->saludables->toma_med_dosis;
        $this->toma_med_frec = $this->saludables->toma_med_frec;
        $this->otros_trata = $this->saludables->otros_trata;
        $this->otra_med = $this->saludables->otra_med;

    }
    public function save_alimenticios(){
        $this->alimenticios->desayuno = $this->desayuno;
        $this->alimenticios->media_manana = $this->media_manana;
        $this->alimenticios->almuerzo = $this->almuerzo;
        $this->alimenticios->merienda = $this->merienda;
        $this->alimenticios->cena = $this->cena;
        $this->alimenticios->paciente_id = $this->paciente_id;

        $this->alimenticios->save();
        $this->message = true;
    }

    public function save_salud(){
        $this->saludables->descripcion = $this->descripcion;
        $this->saludables->trata_med = $this->trata_med;
        $this->saludables->trata_med_nombres = $this->trata_med_nombres;
        $this->saludables->trata_med_seguro = $this->trata_med_seguro;
        $this->saludables->toma_med = $this->toma_med;
        $this->saludables->toma_med_razon = $this->toma_med_razon;
        $this->saludables->toma_med_nombres = $this->toma_med_nombres;
        $this->saludables->toma_med_dosis = $this->toma_med_dosis;
        $this->saludables->toma_med_frec = $this->toma_med_frec;
        $this->saludables->otros_trata = $this->otros_trata;
        $this->saludables->otra_med = $this->otra_med;
        $this->saludables->paciente_id = $this->paciente_id;

        $this->saludables->save();
        $this->message = true;
    }

    public function save_enfer(){
        HabitosBiologicos::create(
            $this->only(['enfermedad_id', 'paciente_id'])
        );

        $this->message = true;
    }

    public function delete_enfer(HabitosBiologicos $enfer){
        $enfer->delete();
    }

    public function render()
    {
        return view('livewire.paciente.fisicas-biologicas', [
            'pa_enfermedades' => HabitosBiologicos::where('paciente_id', $this->paciente_id)->get(),
            'enfermedades' => Enfermedades::where('tipo', '2')->get()
        ]);
    }
}
