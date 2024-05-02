<?php

namespace App\Livewire\Companies;

use Livewire\Component;

class TableDelete extends Component
{
    public $id;

    public function openModal()
    {
        $this->dispatch('openModal', 'companies.table-delete-modal', [
            'id' => $this->id,
        ]);        
    }
    
    public function render()
    {
        return view('livewire.companies.table-delete');
    }
}
