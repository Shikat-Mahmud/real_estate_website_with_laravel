<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProLocationSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_location_sections')->insert([
            [
                'title' => 'Cities With Listing',
                'subtitle' => 'Destinations we love the most',
            ],
        ]);
    }
}
