<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacientesGruposFamiliares extends Model
{
    use HasFactory;
    protected $fillable = ['parentesco_id', 'paciente_id', 'persona_id'];

}
