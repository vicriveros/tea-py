<?php

namespace App\Livewire\Agendamiento;

use App\Models\Agendamientos;
use App\Models\Consultorios;
use App\Models\Especialidades;
use App\Models\Medicos;
use App\Models\MedicosEspecialidades;
use App\Models\Paciente;
use Livewire\Component;

class Calendario extends Component
{
    public $consultorioid = '';
    public $consultorioNombre = '';
    public $medicos_espe = [];
    public $especialidades = [];
    public $agenda = [];

    public function mount($consultorio){
        $this->consultorioid = $consultorio;
        $this->consultorioNombre = $this->getConsultorioName($consultorio);

        $especialidades_ = Especialidades::all();
        foreach($especialidades_ as $esp){
            $medicos = MedicosEspecialidades::join('medicos_horarios', 'medicos_especialidades.medico_id', '=', 'medicos_horarios.medico_id')
            ->where('consultorio_id', '=', $this->consultorioid)
            ->where('especialidad_id', '=', $esp->id)->get();
            $profe=[];
            foreach($medicos as $med){
                $ch=[
                    "id" => $med->medico_id, 
                    "title" => $this->getMedicoName($med->medico_id)
                    ];
                array_push($profe, $ch);
            }
            $item=[ 
                "id" => 'e'.$esp->id,
                "title"=> $esp->nombre,
                "children" => $profe
                ];
            array_push($this->medicos_espe, $item);
            array_push($this->especialidades, 'e'.$esp->id);
        }
        $this->getCitas();
    }

    public function getCitas(){
        $hoy=date('Y-m-d');
        $mesAntes = date('Y-m-d', strtotime($hoy . ' -1 month'));
        $mesDespues = date('Y-m-d', strtotime($hoy . ' +1 month'));
        $agendamiento = Agendamientos::where('consultorio_id', '=', $this->consultorioid)
        ->whereBetween('fecha', [$mesAntes, $mesDespues])->get();

        foreach($agendamiento as $cita){
            $ini=$cita->fecha.'T'.$cita->hora_desde.':00+00:00';
            $fin=$cita->fecha.'T'.$cita->hora_hasta.':00+00:00';
            $item=[
                "id"=> $cita->id,
                "resourceId"=> $cita->medico_id,
                "title"=> $this->getPacienteName($cita->paciente_id),
                "start"=> $ini,
                "end"=> $fin
                ];
            array_push($this->agenda, $item);
        }
    }

    public function getMedicoName($id){
        $med = Medicos::with('persona')->find($id);
        return $med->persona->nombre.' '.$med->persona->apellido; 
    }

    public function getConsultorioName($id){
        $cons = Consultorios::find($id);
        return $cons->nombre; 
    }

    public function getPacienteName($id){
        $pac = Paciente::with('persona')->find($id);
        return $pac->persona->nombre.' '.$pac->persona->apellido; 
    }

    public function render()
    {
        return view('livewire.agendamiento.calendario');
    }
}
