<?php

namespace Database\Seeders;

use App\Models\NearestPlace;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NearestPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NearestPlace::factory()->count(10)->create();
    }
}