<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partos extends Model
{
    use HasFactory;
    protected $fillable = ['nombres', 'paciente_id'];
}
