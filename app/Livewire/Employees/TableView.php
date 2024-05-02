<?php

namespace App\Livewire\Employees;

use Livewire\Component;

class TableView extends Component
{
    public $id;

    public function openModal()
    {
        $this->dispatch('openModal', 'employees.table-view-modal', [
            'id' => $this->id,
        ]);        
    }

    public function render()
    {
        return view('livewire.employees.table-view');
    }
}
