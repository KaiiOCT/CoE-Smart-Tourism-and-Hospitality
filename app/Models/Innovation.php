<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Innovation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'client',
        'jobs'
    ];

    public function firstPhoto(): Attribute
    {
        return new Attribute(
            get: fn() => $this->photos()->first() ?? (object) ['photo_url' => url("/assets/images/innovation-default.webp")],
        );
    }

    /**
     * Get all photos for the innovation
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    /**
     * Get all mitra logos for the innovation
     */
    public function mitra_logos(): HasMany
    {
        return $this->hasMany(MitraLogo::class);
    }

    public function getFirstPhotoAttribute()
    {
        $photo = $this->photos()->first();
        return $photo ? $photo : (object)['photo_url' => asset('assets/images/innovation-default.webp')];
    }
}
