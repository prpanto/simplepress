<?php

namespace App\Livewire\Companies;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Edit extends Component
{
    use WithFileUploads;

    public $company;

    public $name = '';
    public $email = '';
    public $description = '';
    public $website = '';
    public $logo = null;
    public $logoToUpload = null;

    public function mount()
    {
        $this->name = $this->company->name;
        $this->email = $this->company->email;
        $this->description = $this->company->description;
        $this->website = $this->company->website;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'description' => 'string',
            'website' => 'url|string',
            'logo' => ['nullable', File::image()->max(3 * 1024)],
        ]);

        $this->company->name = $this->name;
        $this->company->email = $this->email;
        $this->company->description = $this->description;
        $this->company->website = $this->website;

        if ($this->logo) {
            $this->logoToUpload = new TemporaryUploadedFile($this->logo->getRealPath(), config('filesystems.default'));
            $this->company->logo = $this->logoToUpload->storePublicly('logos', 'public');
        }

        $this->company->save();
        
        session()->flash('status', 'Company edited successfully!');

        return $this->redirectRoute('companies.index');
    }

    public function render()
    {
        return view('livewire.companies.edit');
    }
}
