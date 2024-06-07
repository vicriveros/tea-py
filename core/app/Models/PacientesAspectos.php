<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacientesAspectos extends Model
{
    use HasFactory;
    protected $fillable = ['paciente_id', 'aspecto_id'];
}
