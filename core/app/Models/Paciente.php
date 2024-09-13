<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['colegio', 'grado', 'diag_nombres', 'diag_edad', 'diag_responsable', 'diag_datos', 'centro_programa', 'persona_id', 'nacionalidad_id', 'user_id'];
    
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
}
