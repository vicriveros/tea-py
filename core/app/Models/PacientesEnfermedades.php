<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacientesEnfermedades extends Model
{
    use HasFactory;
    protected $fillable = ['paciente_id', 'enfermedad_id'];
}
