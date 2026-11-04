<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',        // Pastikan ini ada
        'link',
        'content',     // Pastikan ini ada
        'slug',        // Pastikan ini ada
        'date',
        'category_id',
        'is_main',
        'photo',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }
}