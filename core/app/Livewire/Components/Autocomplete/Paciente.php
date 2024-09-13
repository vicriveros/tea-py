<?php

namespace App\Livewire\Components\Autocomplete;

use App\Models\Persona;
use Livewire\Component;

class Paciente extends Component
{
    public $query = '';            // The search query
    public $results = [];          // Array to hold the results
    public $highlightedIndex = 0;  // Track the currently highlighted index

    // This method is triggered each time the query changes
    public function updatedQuery()
    {
        $this->highlightedIndex = 0; // Reset the highlighted index
        if (!empty($this->query)) {
            // Fetch users matching the query
            $this->results = Persona::join('pacientes', 'personas.id', '=', 'pacientes.persona_id')
                                ->where('nombre', 'like', '%'.$this->query.'%')
                                ->orWhere('apellido', 'like', '%'.$this->query.'%')
                                ->orWhere('documento', 'like', '%'.$this->query.'%')
                                ->get(['pacientes.id', 'personas.nombre', 'personas.apellido', 'personas.documento'])
                                ->toArray();
        } else {
            $this->results = [];
        }
    }

    // Select a result by clicking or pressing Enter
    public function selectResult($nombre, $apellido, $documento, $id)
    {
        $this->query = $nombre.' '.$apellido.' - '.$documento;
        $this->results = []; // Clear the results after selection

        $this->dispatch('resultSelected', $id); // Send selected to parent component
    }

    // Move the highlighted index based on arrow keys
    public function moveHighlight($direction)
    {
        if ($direction === 'up') {
            $this->highlightedIndex = max($this->highlightedIndex - 1, 0);
        } elseif ($direction === 'down') {
            $this->highlightedIndex = min($this->highlightedIndex + 1, count($this->results) - 1);
        }
    }

    // Handle when Enter is pressed to select the highlighted item
    public function selectHighlighted()
    {
        if (!empty($this->results)) {
            $this->selectResult(
                $this->results[$this->highlightedIndex]['nombre'],
                $this->results[$this->highlightedIndex]['apellido'],
                $this->results[$this->highlightedIndex]['documento'],
                $this->results[$this->highlightedIndex]['id']
            );
        }
    }

    public function render()
    {
        return view('livewire.components.autocomplete.paciente');
    }
}
