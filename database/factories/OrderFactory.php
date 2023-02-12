<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => json_encode([
                'geo_lat' => fake()->randomFloat(7, 50, 60),
                "geo_lon" => fake()->randomFloat(7, 30, 40),
            ], JSON_THROW_ON_ERROR),
            'sum_of_order' => fake()->numberBetween(10, 1000),
        ];
    }
}
