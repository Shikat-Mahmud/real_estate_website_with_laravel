<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'bed_room' => $this->faker->numberBetween(1, 5),
            'room' => $this->faker->numberBetween(1, 5),
            'bathroom' => $this->faker->numberBetween(1, 3),
            'sqft' => $this->faker->randomFloat(2, 500, 5000),
            'unit' => $this->faker->numberBetween(1, 10),
            'floor' => $this->faker->numberBetween(1, 20),
            'kitchen' => $this->faker->numberBetween(1, 2),
            'parking' => $this->faker->numberBetween(0, 2),
            'propertyid' => $this->faker->uuid,
            'rent_type' => $this->faker->randomElement(['monthly', 'yearly']),
            'floor_plan' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 500, 5000),
            'video_url' => $this->faker->url,
            'property_images' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement([0, 1]),
            'location_id' => $this->faker->numberBetween(1, 10),
            'amenities' => json_encode([$this->faker->numberBetween(1, 10)]),
            'property_type_id' => $this->faker->numberBetween(1, 5), 
            'property_status_id' => $this->faker->numberBetween(1, 3), 
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}