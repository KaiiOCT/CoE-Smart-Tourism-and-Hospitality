<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function firstPhoto(): Attribute
    {
        return new Attribute(
            get: fn() => $this->photos()->first() ?? (object) ['photo_url' => url("/assets/images/shop-default.png")],
        );
    }

    /**
     * Get all of the photos for the Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class, 'shop_id', 'id');
    }


}
