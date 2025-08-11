<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'innovation_id',
        'shop_id',
        'innovillage_id',
        'community_service_id'
    ];

    protected $appends = ['photo_url'];

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && Storage::disk('public')->exists($this->photo)) {
            return Storage::url($this->photo);
        }

        // Return appropriate default image based on relationship
        if ($this->shop_id) {
            return asset('assets/images/shop-default.png');
        } elseif ($this->innovillage_id) {
            return asset('assets/images/innovillage-default.png');
        } elseif ($this->innovation_id) {
            return asset('assets/images/innovation-default.webp');
        } elseif ($this->community_service_id) {
            return asset('assets/images/community-service-default.webp');
        }

        return asset('assets/images/news-default.webp');
    }

    /**
     * Get the shop that owns the Photo
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the innovillage that owns the Photo
     */
    public function innovillage(): BelongsTo
    {
        return $this->belongsTo(Innovation::class, 'innovillage_id');
    }

    /**
     * Get the innovation that owns the Photo
     */
    public function innovation(): BelongsTo
    {
        return $this->belongsTo(Innovation::class);
    }

    /**
     * Get the community_service that owns the Photo
     */
    public function community_service(): BelongsTo
    {
        return $this->belongsTo(CommunityService::class);
    }
}
