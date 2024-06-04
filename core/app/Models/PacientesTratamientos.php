<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacientesTratamientos extends Model
{
    use HasFactory;
    protected $fillable = ['paciente_id', 'fecha_eval', 'nombre_medico', 'tratamiento_id'];
}
