<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class TableViewModal extends ModalComponent
{
    public $id;

    public function mount()
    {
        if (!auth()->user()->can('view:categories')) {
            abort(403);
        }
    }

    public function render()
    {
        return view('livewire.categories.table-view-modal', [
            'category' => Category::find($this->id),
        ]);
    }
}
