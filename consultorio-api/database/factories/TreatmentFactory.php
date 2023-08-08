<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treatment>
 */
class TreatmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence($nbWords = 4, $variableNbWords = true),
            'description'=>fake()->realText($maxNbChars = 200, $indexSize = 2),
            'protocols'=>fake()->realText($maxNbChars = 50, $indexSize = 4),
            'cost'=>fake()->numberBetween($min = 10, $max = 100),
            'duration' => fake()->numberBetween($min = 1, $max = 4),
        ];
    }
}
