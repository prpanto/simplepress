<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
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
        return view('livewire.employees.table-view-modal', [
            'employee' => Employee::find($this->id),
        ]);
    }
}
