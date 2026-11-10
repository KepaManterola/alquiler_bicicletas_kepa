<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bike extends Model
{
    protected $table = 'bikes';

    protected $fillable = [
        'name',
        'description',
        'type',
        'price_per_hour',
        'image',
        'available'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'bicycle_id');
    }
}

