<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use LivewireUI\Modal\ModalComponent;

class TableDeleteModal extends ModalComponent
{
    public $id;

    public function mount()
    {
        if (!auth()->user()->can('delete:categories')) {
            abort(403);
        }
    }

    public function destroy()
    {
        $company = Company::find($this->id);
        $company->delete();
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.companies.table-delete-modal');
    }
}
