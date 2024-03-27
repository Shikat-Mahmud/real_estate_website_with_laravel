<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProTypeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_type_sections')->insert([
            [
                'title' => 'Explore by Property Type',
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed',
            ],
        ]);
    }
}
