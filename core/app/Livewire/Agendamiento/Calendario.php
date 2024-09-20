<?php

namespace App\Livewire\Agendamiento;

use Livewire\Component;

class Calendario extends Component
{
    public $consultorioid = '';

    public function mount($consultorio){
        $this->consultorioid = $consultorio;
    }

    public function render()
    {
        return view('livewire.agendamiento.calendario');
    }
}
