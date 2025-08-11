<?php

namespace Database\Factories;

use App\Models\Intern;
use App\Models\InternMajor;
use App\Models\InternProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intern>
 */
class InternFactory extends Factory
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
            'description' => $this->faker->paragraphs(3, true),
            'photo' => $this->faker->imageUrl(640, 480, 'people', true, 'Intern Photo'),
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Intern $intern) {
            InternMajor::factory()->count(3)->create([
                "intern_id" => $intern->id,
            ]);
            InternProject::factory()->count(2)->create([
                "intern_id" => $intern->id,
            ]);
        });
    }
}
