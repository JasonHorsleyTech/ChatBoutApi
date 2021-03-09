<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Traveler extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'secret',
        'print',
        'name',
        'location_id',
        'last_seen',
    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
