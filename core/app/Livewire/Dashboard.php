<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $search = '';
    public $sortCol = null;
    public $sortAsc = false;

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
                ->where('nombre', 'like', '%'.$this->search.'%')
                ->orWhere('apellido', 'like', '%'.$this->search.'%')
                ->orWhere('documento', 'like', '%'.$this->search.'%');
    }

    protected function applySorting($query){
        if($this->sortCol){
            $column = match ($this->sortCol){ //el primer nombre es un alias el segundo es el campo en la bd
                'nombre' => 'nombre',
                'apellido' => 'apellido',
            };
            $query -> orderBy($column, $this->sortAsc ? 'asc' : 'desc');
        }
        return $query;
    }

    public function render()
    {
        $userid= Auth::id();
        $query = DB::table('personas')
            ->join('pacientes', 'personas.id', '=', 'pacientes.persona_id')
            ->where('user_id', '=', $userid);

        $query = $this->applySearch($query);

        $query = $this->applySorting($query);

        return view('livewire.dashboard', [
            'personas' => $query -> paginate(10),
        ]);
    }
}
