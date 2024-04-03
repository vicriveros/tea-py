<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.usuario.index', [
            'usuarios' => User::paginate(2),
        ]);
    }
}
