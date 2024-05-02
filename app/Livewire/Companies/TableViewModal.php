<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use LivewireUI\Modal\ModalComponent;

class TableViewModal extends ModalComponent
{
    public $id;

    public function mount()
    {
        if (!auth()->user()->can('view:categories')) {
            abort(403);
        }
    }

    public function render()
    {
        return view('livewire.companies.table-view-modal', [
            'company' => Company::find($this->id),
        ]);
    }
}
