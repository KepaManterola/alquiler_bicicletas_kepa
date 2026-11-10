<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bike extends Model
{
    protected $table = 'bikes';

    protected $fillable = [
        'serial_number',
        'model',
        'price_per_hour',
        'status'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'bike_id');
    }
}