<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(3, true),
            'date' => $this->faker->date(),
            'location' => $this->faker->city(),
            'type' => $this->faker->word(),
            'link' => $this->faker->url(),
            'photo' => $this->faker->imageUrl(640, 480, 'trainings', true, 'Training'),
        ];
    }
}
