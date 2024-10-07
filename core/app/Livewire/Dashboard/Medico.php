<?php

namespace App\Livewire\Dashboard;

use App\Models\Agendamientos;
use App\Models\Medicos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Medico extends Component
{
    public $citas = [];
    public $hoy = '';
    public $manana = '';
     
    public function mount(){
        $hoy = date('Y-m-d');
        $manana = date('Y-m-d', strtotime($hoy . ' +1 day'));
        $semana = date('Y-m-d', strtotime($hoy . ' +7 day'));
        $userid= Auth::id();
        $prof = Medicos::where('user_id', $userid)->first();
        if($prof){
            $profesional = $prof->id;
        }else{
            $profesional=0;
        }


        $query = Agendamientos::join('pacientes', 'agendamientos.paciente_id', '=', 'pacientes.id')
            ->join('personas AS pacientes_personas', 'pacientes.persona_id', '=', 'pacientes_personas.id')
            ->join('medicos', 'agendamientos.medico_id', '=', 'medicos.id')
            ->join('personas AS medicos_personas', 'medicos.persona_id', '=', 'medicos_personas.id')
            ->join('especialidades', 'agendamientos.especialidad_id', '=', 'especialidades.id')
            ->join('consultorios', 'agendamientos.consultorio_id', '=', 'consultorios.id')
            ->select(
                'agendamientos.id', 
                DB::raw("CONCAT(pacientes_personas.nombre, ' ', pacientes_personas.apellido) AS paciente_nombre"), 
                DB::raw("CONCAT(medicos_personas.nombre, ' ', medicos_personas.apellido) AS medico_nombre"), 
                'agendamientos.fecha', 
                'agendamientos.hora_desde', 
                'agendamientos.obs', 
                'consultorios.nombre as consultorio', 
                'especialidades.nombre as especialidad'
                )
            ->whereBetween('agendamientos.fecha', [$hoy, $semana])
            ->where('agendamientos.medico_id', '=', $profesional);
            $this->citas = $query -> get();
            $this->hoy = $hoy;
            $this->manana = $manana;
        }
    public function render()
    {
        return view('livewire.dashboard.medico', [
            'agendamientos' => $this->citas,
        ]);
    }
}
