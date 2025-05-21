<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Driver extends Model
{
    protected $fillable = ['name', 'license_number', 'phone'];

    // 1 Driver memiliki banyak kendaraan
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    // 1 Driver memiliki banyak jadwal
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    // Driver bisa mengikuti banyak Trip (many-to-many)
    public function trips(): BelongsToMany
    {
        return $this->belongsToMany(Trip::class);
    }
}