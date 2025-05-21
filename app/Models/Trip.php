<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Trip extends Model
{
    protected $fillable = [
        'route',
        'start_time',
        'end_time',
    ];

    public function drivers(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Driver::class);
    }
}