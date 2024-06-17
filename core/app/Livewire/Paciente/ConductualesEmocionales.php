<?php

namespace App\Livewire\Paciente;

use App\Models\Conductas;
use App\Models\HabitosConductuales;
use App\Models\HabitosEmocionales;
use App\Models\Paciente;
use Livewire\Component;

class ConductualesEmocionales extends Component
{
    public Paciente $paciente;

    public $paciente_id = '';
    public $conducta_id = '';
    public $ahora = '';
    public $pasado = '';
    public $econducta_id = '';
    public $presenta = '';
    public $presenta_emo = '';
    
    public $message = false;

    public function mount(Paciente $pacienteid){
        $this->paciente = $pacienteid;
        $this->paciente_id = $this->paciente->id;   
    }

    public function save_conduc(){

        HabitosConductuales::create(
            $this->only(['conducta_id', 'paciente_id', 'ahora', 'pasado'])
        );

        $this->message = true;
    }

    public function delete_conduc(HabitosConductuales $conduc){
        $conduc->delete();
    }

    public function save_emo(){

        HabitosEmocionales::create([
            'conducta_id' => $this->econducta_id, 
            'paciente_id' => $this->paciente_id, 
            'presenta' => $this->presenta, 
            'presenta_emo' => $this->presenta_emo
        ]);

        $this->message = true;
    }

    public function delete_emo(HabitosEmocionales $conduc){
        $conduc->delete();
    }

    public static function getConductasName($id){
        $cond = Conductas::find($id);
        return $cond->nombre;    
    }

    public function render()
    {
        return view('livewire.paciente.conductuales-emocionales', [
            'pa_conductuales' => HabitosConductuales::where('paciente_id', $this->paciente_id)->get(),
            'conductuales' => Conductas::where('tipo', '1')->get(),
            'pa_emocionales' => HabitosEmocionales::where('paciente_id', $this->paciente_id)->get(),
            'emocionales' => Conductas::where('tipo', '2')->get()
        ]);
    }
}
