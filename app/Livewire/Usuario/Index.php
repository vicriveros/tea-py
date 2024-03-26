<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.usuario.index', [
            'usuarios' => User::all(),
        ]);
    }
}
