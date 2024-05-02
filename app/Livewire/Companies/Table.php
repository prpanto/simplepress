<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $perPage = 25;
    
    public function render()
    {
        return view('livewire.companies.table', [
            'companies' => Company::with('categories')->paginate($this->perPage)
        ]);
    }
}
