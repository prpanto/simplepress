<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Create extends Component
{
    use WithFileUploads;

    public $company;
    
    public $name = '';
    public $email = '';
    public $description = '';
    public $website = '';
    public $logo = null;
    public $logoToUpload = null;

    public function mount(Company $company)
    {
        $this->company = $company;
    }
 
    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'description' => 'string',
            'website' => 'string',
            'logo' => ['nullable', File::image()->max(3 * 1024)],
        ]);

        $company = Company::create([
            'name' => $this->name,
            'email' => $this->email,
            'description' => $this->description,
            'website' => 'https://' . $this->website,
        ]);

        if ($this->logo) {
            $this->logoToUpload = new TemporaryUploadedFile($this->logo->getRealPath(), config('filesystems.default'));
            $company->logo = $this->logoToUpload->storePublicly('logos', 'public');
            $company->save();
        }

        session()->flash('status', 'Company created successfully.');
 
        return $this->redirectRoute('companies.index');
    }

    public function render()
    {
        return view('livewire.companies.create');
    }
}
