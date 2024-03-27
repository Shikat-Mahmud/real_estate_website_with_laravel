<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PropertyStatusTableSeeder::class,
            AmenitiesTableSeeder::class,
            LocationsTableSeeder::class,
            PropertyTypeTableSeeder::class,
            NearestPlaceSeeder::class,
            PropertiesTableSeeder::class,
            ApplicationSettingsSeeder::class,
            PrivacySeeder::class,
            AboutSeeder::class,
            TermsSeeder::class,
            HeroSectionSeeder::class,
            ProTypeSectionSeeder::class,
            FeturePropertySectionSeeder::class,
            PartnerSectionSeeder::class,
            FaqSectionSeeder::class,
        ]);
    }
}