<?php

namespace App\Livewire\Categories;

use App\Models\Category;
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
        $company = Category::find($this->id);
        $company->delete();
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.categories.table-delete-modal');
    }
}
