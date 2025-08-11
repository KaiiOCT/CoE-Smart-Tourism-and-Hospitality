<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MitraLogo extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    /**
     * Get the innovation that owns the MitraLogo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function innovation(): BelongsTo
    {
        return $this->belongsTo(Innovation::class, 'innovation_id', 'id');
    }
    /**
     * Get the community_service that owns the MitraLogo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function community_service(): BelongsTo
    {
        return $this->belongsTo(CommunityService::class, 'community_service_id', 'id');
    }
}
