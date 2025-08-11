<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function photoUrl(): Attribute
    {
        return new Attribute(
            get: fn() => ($this->photo && Storage::exists($this->photo)) ? url("/storage/$this->photo") : url("/assets/images/news-default.webp"),
        );
    }

    /**
     * Get the category that owns the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id', 'id');
    }
}
