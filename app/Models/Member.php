<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Member extends Model
{
    protected $table = 'members';
    
    use HasFactory;
    protected $guarded = ["id"];

    protected $fillable = [
        'name',
        'position',
        'status',
        'photo'
    ];

    /**
     * Get the photo URL attribute.
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            if (Storage::disk('public')->exists($this->photo)) {
                return asset('storage/' . $this->photo);
            }
        }
        return asset('assets/images/user-default.jpg');
    }
}
