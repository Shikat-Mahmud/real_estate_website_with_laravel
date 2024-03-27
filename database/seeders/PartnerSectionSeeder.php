<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PartnerSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('partner_sections')->insert([
            [
                'title' => 'Hundreds of Partners Around the World',
                'subtitle' => 'Every day, we build trust through communication, transparency, and results.',
            ],
        ]);
    }
}
