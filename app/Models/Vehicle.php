<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    protected $fillable = [
        'driver_id',
        'plate_number',
        'brand',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Driver::class);
    }
}