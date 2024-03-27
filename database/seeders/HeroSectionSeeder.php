<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hero_sections')->insert([
            [
                'title' => 'Find Your Best Dream House for Rental, Buy & Sell...',
                'subtitle' => 'Properties for buy / rent in in your location. We have more than 3000+ listings for you to choose',
            ],
        ]);
    }
}
