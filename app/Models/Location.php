<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['location_key'];

    public function travelers(): HasMany
    {
        return $this->hasMany(Traveler::class);
    }

    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }
}
