<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $perPage = 25;
    
    public function render()
    {
        return view('livewire.employees.table', [
            'employees' => Employee::paginate($this->perPage)
        ]);
    }
}
