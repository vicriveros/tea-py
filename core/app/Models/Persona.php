<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'apellido', 'documento', 'fecha_nacimiento', 'direccion', 'barrio', 'telefono', 'mail'];

    public function medicos(){
        return $this->hasMany(Medicos::class);
    }
}
