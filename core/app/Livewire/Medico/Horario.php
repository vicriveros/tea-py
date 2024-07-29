<?php

namespace App\Livewire\Medico;

use App\Models\Medicos;
use App\Models\MedicosHorarios;

use Livewire\Component;

class Horario extends Component
{
    public function render()
    {
        return view('livewire.medico.horario');
    }
}
