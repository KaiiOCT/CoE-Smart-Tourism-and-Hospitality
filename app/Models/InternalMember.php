<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InternalMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'is_leader',
        'study_program',
        'education',
        'research_field',
        'email',
        'instagram',
        'linkedin',
        'profile_picture'
    ];

    protected $casts = [
        'is_leader' => 'boolean',
    ];

    public function photoUrl(): Attribute
    {
        return new Attribute(
            get: fn() => ($this->photo && Storage::exists($this->photo)) ? url("/storage/$this->profile_picture") : url("/assets/images/user-default.jpg"),
        );
    }

    /**
     * Get the profile picture URL.
     */
    public function getProfilePictureAttribute($value)
    {
        return $value ? asset('storage/members/' . $value) : asset('images/default-avatar.png');
    }

    /**
     * Get the photo URL accessor for blade templates.
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->attributes['profile_picture']) {
            $path = 'members/' . $this->attributes['profile_picture'];
            if (Storage::disk('public')->exists($path)) {
                return asset('storage/' . $path);
            }
        }
        return asset('images/default-avatar.png');
    }
}
