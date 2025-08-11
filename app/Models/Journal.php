<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'writer',
        'journal_link',
        'doi_link',
        'photo'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function getPhotoUrlAttribute()
    {
        if ($this->photo && Storage::disk('public')->exists($this->photo)) {
            return asset('storage/' . $this->photo);
        }
        return asset('assets/images/journal-default.webp');
    }
}
