<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PrivacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {     
        DB::table('privacies')->insert([
            [
                'content' => 'Default privacy policy content goes here.',
            ],
        ]);
    }
}
