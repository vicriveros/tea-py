<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch(){
        $this->resetPage();
    }

    protected function applySearch($query){
        return $this->search === ''
            ? $query
            : User::
                where('email', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%')
                ->paginate(10);
    }

    public function render()
    {
        $query = User::paginate(10); 
        $query = $this->applySearch($query);

        return view('livewire.usuario.index', [
            'usuarios' => $query,
        ]);
    }
}
