<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FeturePropertySectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('feture_property_sections')->insert([
            [
                'title' => 'Featured Properties for Rent or Sell',
                'subtitle' => 'Hand-picked selection of quality places',
            ],
        ]);
    }
}
