<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Edit extends Component
{
    use WithFileUploads;

    public $category;

    #[Validate('required|string')]
    public $name = '';
    #[Validate('string')]
    public $description = '';

    public function mount()
    {
        $this->name = $this->category->name;
        $this->description = $this->category->description;
    }

    public function save()
    {
        $this->category->name = $this->name;
        $this->category->description = $this->description;

        $this->category->save();
        
        session()->flash('status', 'Category edited successfully!');

        return $this->redirectRoute('categories.index');
    }

    public function render()
    {
        return view('livewire.categories.edit');
    }
}
