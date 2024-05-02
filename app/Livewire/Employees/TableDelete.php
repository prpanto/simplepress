<?php

namespace App\Livewire\Employees;

use Livewire\Component;

class TableDelete extends Component
{
    public $id;

    public function openModal()
    {
        $this->dispatch('openModal', 'employees.table-delete-modal', [
            'id' => $this->id,
        ]);        
    }
    
    public function render()
    {
        return view('livewire.employees.table-delete');
    }
}
