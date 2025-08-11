<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Intern extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'photo'
    ];

    /**
     * Get the photo URL attribute
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->photo && Storage::disk('public')->exists($this->photo)) {
            return asset('storage/' . $this->photo);
        }
        return asset('assets/images/intern-default.webp');
    }

    /**
     * Get all of the majors for the Intern
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function majors(): HasMany
    {
        return $this->hasMany(InternMajor::class, 'intern_id', 'id');
    }

    /**
     * Get all of the projects for the Intern
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(InternProject::class, 'intern_id', 'id');
    }
}
