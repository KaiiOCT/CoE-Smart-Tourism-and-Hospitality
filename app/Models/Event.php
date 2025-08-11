<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'category'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get formatted start date
     */
    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->format('d F Y');
    }

    /**
     * Get formatted end date
     */
    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->format('d F Y');
    }

    /**
     * Get formatted category in Indonesian
     */
    public function getFormattedCategoryAttribute()
    {
        return $this->category === 'lkm' ? 'LKM' : 'Eksternal';
    }
}
