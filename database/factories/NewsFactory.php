<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraphs(3, true),
            'link' => $this->faker->url,
            'date' => $this->faker->date(),
            'category_id' => $this->faker->randomElement([1, 2]), // Randomly assigns category_id to 1 or 2
            'is_main' => $this->faker->boolean,
            'photo' => $this->faker->imageUrl(),
        ];
    }
}
