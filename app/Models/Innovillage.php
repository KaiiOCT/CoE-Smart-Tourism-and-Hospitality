<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Innovillage extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function firstPhoto(): Attribute
    {
        return new Attribute(
            get: fn() => $this->photos()->first() ?? (object) ['photo_url' => url("/assets/images/innovillage-default.png")],
        );
    }
    /**
     * Get all of the teams for the Innovillage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(InnovillageTeam::class, 'innovillage_id', 'id');
    }

    /**
     * Get all of the photos for the Innovillage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class, 'innovillage_id', 'id');
    }
}
