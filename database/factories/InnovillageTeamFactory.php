<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InnovillageTeam>
 */
class InnovillageTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'photo' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
            'innovillage_id' => null,
        ];
    }
}
