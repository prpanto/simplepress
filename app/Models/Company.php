<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'description',
        'website',
        'logo',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_company');
    }

    public function logoUrl()
    {
        if ($this->profile_photo_url) {
            return Storage::disk('local')->url($this->profile_photo_url);
        }

        return $this->defaultLogoUrl();
    }

    public function defaultLogoUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name ?? 'Company Name') . '&color=60a5fa&background=2563eb';
    }
}
