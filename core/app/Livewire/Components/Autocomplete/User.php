<?php

namespace App\Livewire\Components\Autocomplete;

use Livewire\Component;

class User extends Component
{
    public $results;
    public $search;
    public $selected;
    public $showDropdown;

    public function mount()
    {
        $this->showDropdown = false;
        $this->results = collect();
    }

    public function updatedSearch()
    {
        if (strlen($this->search) < 2) {
            $this->results = collect();
            $this->showDropdown = false;
            return;
        }

        if ($this->query()) {
            $this->results = $this->query()->get();
        } else {
            $this->results = collect();
        }

        $this->selected = '';
        $this->showDropdown = true;
    }

    public function sendValue()
    {
        $this->dispatch('userSelected', ['name' => $this->search, 'id'=>$this->selected]);
    }

    public function query() {
        return \App\Models\User::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('name', 'like', '%'.$this->search.'%')
            ->orderBy('name');
    }

    public function render()
    {
        return view('livewire.components.autocomplete.user');
    }
}
