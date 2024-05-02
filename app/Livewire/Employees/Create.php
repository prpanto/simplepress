<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads;

    public $employee;
    
    #[Validate('required|string')]
    public $fullname = '';
    #[Validate('required|string')]
    public $email = '';
    #[Validate('string')]
    public $phone = '';

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }
 
    public function save()
    {
        Employee::create([
            'fullname' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        session()->flash('status', 'Employee created successfully.');
 
        return $this->redirectRoute('employees.index');
    }

    public function render()
    {
        return view('livewire.employees.create');
    }
}
