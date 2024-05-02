<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $perPage = 25;
    
    public function render()
    {
        return view('livewire.categories.table', [
            'categories' => Category::paginate($this->perPage)
        ]);
    }
}
