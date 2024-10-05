<?php

namespace App\Exports;

use App\Models\Agendamientos;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class AgendaExport implements FromQuery
{
    use Exportable;
    public $consultorio = '';
    public $especialidad = '';
    public $profesional = '';
    public $fecha_desde = '';
    public $fecha_hasta = '';

    public function __construct($consultorio, $especialidad, $profesional, $fecha_desde, $fecha_hasta)
    {
        $this->consultorio = $consultorio;
        $this->especialidad = $especialidad;
        $this->profesional = $profesional;
        $this->fecha_desde = $fecha_desde;
        $this->fecha_hasta = $fecha_hasta;
    }

    protected function applySearch($query){
        if ($this->consultorio != 0 and $this->consultorio != ''){
            $query ->where('agendamientos.consultorio_id', '=', $this->consultorio);
        }
        if ($this->especialidad != 0 and $this->especialidad != ''){
            $query ->where('agendamientos.especialidad_id', '=', $this->especialidad);
        }
        if ($this->profesional != 0 and $this->profesional != ''){
            $query ->where('agendamientos.medico_id', '=', $this->profesional);
        }
        if ($this->fecha_desde != '' and $this->fecha_hasta != ''){
            $query ->whereBetween('agendamientos.fecha', [$this->fecha_desde, $this->fecha_hasta]);
        }
        
        return $query;
    }

    public function query()
    {
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
            );
        $query = $this->applySearch($query);   
        return $query;
    }
}
