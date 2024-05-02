<?php

namespace App\Livewire\Companies;

use Livewire\Component;

class TableView extends Component
{
    public $id;

    public function openModal()
    {
        $this->dispatch('openModal', 'companies.table-view-modal', [
            'id' => $this->id,
        ]);        
    }

    public function render()
    {
        return view('livewire.companies.table-view');
    }
}
