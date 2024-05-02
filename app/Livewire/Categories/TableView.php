<?php

namespace App\Livewire\Categories;

use Livewire\Component;

class TableView extends Component
{
    public $id;

    public function openModal()
    {
        $this->dispatch('openModal', 'categories.table-view-modal', [
            'id' => $this->id,
        ]);        
    }

    public function render()
    {
        return view('livewire.categories.table-view');
    }
}
