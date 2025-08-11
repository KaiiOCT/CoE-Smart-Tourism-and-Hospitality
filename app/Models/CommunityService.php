<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommunityService extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function firstPhoto(): Attribute
    {
        return new Attribute(
            get: fn() => $this->photos()->first() ?? (object) ['photo_url' => url("/assets/images/community-service-default.webp")],
        );
    }
    /**
     * Get all of the photos for the CommunityService
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class, 'community_service_id', 'id');
    }
    /**
     * Get all of the mitra_logos for the CommunityService
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mitra_logos(): HasMany
    {
        return $this->hasMany(MitraLogo::class, 'community_service_id', 'id');
    }
}
