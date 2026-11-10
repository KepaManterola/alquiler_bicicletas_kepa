<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bike;

class BikeSeeder extends Seeder
{
    public function run(): void
    {
        Bike::create([
            'serial_number' => 'BIKE001',
            'model' => 'Mountain Bike',
            'price_per_hour' => 5.00,
            'status' => 'available',
        ]);

        Bike::create([
            'serial_number' => 'BIKE002',
            'model' => 'City Bike',
            'price_per_hour' => 3.50,
            'status' => 'available',
        ]);

        Bike::create([
            'serial_number' => 'BIKE003',
            'model' => 'Electric Bike',
            'price_per_hour' => 8.00,
            'status' => 'available',
        ]);

        Bike::create([
            'serial_number' => 'BIKE004',
            'model' => 'Road Bike',
            'price_per_hour' => 6.00,
            'status' => 'maintenance',
        ]);
    }
}