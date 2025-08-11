<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InternProject extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    /**
     * Get the intern that owns the InternProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function intern(): BelongsTo
    {
        return $this->belongsTo(Intern::class, 'intern_id', 'id');
    }
}
