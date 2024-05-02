<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Combobox extends Component
{
    use WithPagination;

    public $selectedCategories;
    
    public function render()
    {
        return view('livewire.combobox', [
            'categories' => Category::paginate(10)
        ]);
    }
}
