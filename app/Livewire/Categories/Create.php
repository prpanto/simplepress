<?php

namespace App\Livewire\Categories;

use App\Models\category;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $category;
    
    #[Validate('require|string')]
    public $name = '';
    #[Validate('string')]
    public $description = '';

    public function mount(Category $category)
    {
        $this->category = $category;
    }
 
    public function save()
    {
        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('status', 'Category created successfully.');
 
        return $this->redirectRoute('categories.index');
    }

    public function render()
    {
        return view('livewire.categories.create');
    }
}
