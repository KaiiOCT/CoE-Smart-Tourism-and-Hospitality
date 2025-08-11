<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'program' => $this->faker->jobTitle(),
            'photo' => $this->faker->imageUrl(640, 480, 'business', true, 'Partner Photo'), // Generates a random image URL
        ];
    }
}
