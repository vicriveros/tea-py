<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortCol = null;
    public $sortAsc = false;

    public static function getUserRole($id){
        $user = User::find($id);
        return $user->roles->pluck('name')[0] ?? '';    
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function sortBy($column){
        if($this->sortCol === $column){
            $this->sortAsc = ! $this->sortAsc;
        }else{
            $this->sortCol = $column;
            $this->sortAsc = false;
        }
    }

    protected function applySearch($query){
        return $this->search === ''
            ? $query
            : $query
                ->where('email', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%');
    }

    protected function applySorting($query){
        if($this->sortCol){
            $column = match ($this->sortCol){ //el primer nombre es un alias el segundo es el campo en la bd
                'name' => 'name',
                'email' => 'email',
            };
            $query -> orderBy($column, $this->sortAsc ? 'asc' : 'desc');
        }
        return $query;
    }

    public function render()
    {
        $query = DB::table('users');

        $query = $this->applySearch($query);

        $query = $this->applySorting($query);

        return view('livewire.usuario.index', [
            'usuarios' => $query -> paginate(10),
        ]);
    }
}
