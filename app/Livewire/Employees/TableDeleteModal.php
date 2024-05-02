<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
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
        $employee = Employee::find($this->id);
        $employee->delete();
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.employees.table-delete-modal');
    }
}
