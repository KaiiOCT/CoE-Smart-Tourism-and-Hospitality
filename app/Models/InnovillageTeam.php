<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class InnovillageTeam extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function photoUrl(): Attribute
    {
        return new Attribute(
            get: fn() => ($this->photo && Storage::exists($this->photo)) ? url("/storage/$this->photo") : url("/assets/images/user-default.jpg"),
        );
    }
    /**
     * Get the innovillage that owns the InnovillageTeam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function innovillage(): BelongsTo
    {
        return $this->belongsTo(Innovillage::class, 'innovillage_id', 'id');
    }
}
