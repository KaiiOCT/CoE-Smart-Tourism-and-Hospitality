<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InternMajor extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    /**
     * Get the inter that owns the InternMajor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function intern(): BelongsTo
    {
        return $this->belongsTo(Intern::class, 'intern_id', 'id');
    }
}
