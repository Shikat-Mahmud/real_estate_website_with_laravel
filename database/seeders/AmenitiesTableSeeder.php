<?php

namespace Database\Seeders;

use App\Models\Amenitie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amenitie::factory()->count(10)->create();
    }
}