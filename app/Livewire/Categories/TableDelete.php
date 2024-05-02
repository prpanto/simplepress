<?php

namespace App\Livewire\Categories;

use Livewire\Component;

class TableDelete extends Component
{
    public $id;

    public function openModal()
    {
        $this->dispatch('openModal', 'categories.table-delete-modal', [
            'id' => $this->id,
        ]);        
    }
    
    public function render()
    {
        return view('livewire.categories.table-delete');
    }
}
