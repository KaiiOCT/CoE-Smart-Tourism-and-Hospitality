<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = $this->faker->dateTimeBetween('now', '+1 month');
        $end_date = $this->faker->dateTimeBetween($start_date, '+1 month');

        return [
            'name' => $this->faker->word,
            'start_date' => $start_date->format('Y-m-d'),
            'end_date' => $end_date->format('Y-m-d'),
            'category' => $this->faker->randomElement(['lkm', 'external']),
        ];
    }
}
