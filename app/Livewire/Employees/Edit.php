<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $employee;

    public $fullname = '';
    public $email = '';
    public $phone = '';

    public function mount()
    {
        $this->fullname = $this->employee->fullname;
        $this->email = $this->employee->email;
        $this->phone = $this->employee->phone;
    }

    public function save()
    {
        $this->employee->fullname = $this->fullname;
        $this->employee->email = $this->email;
        $this->employee->phone = $this->phone;

        $this->employee->save();
        
        session()->flash('status', 'Employee edited successfully!');

        return $this->redirectRoute('employees.index');
    }

    public function render()
    {
        return view('livewire.employees.edit');
    }
}
