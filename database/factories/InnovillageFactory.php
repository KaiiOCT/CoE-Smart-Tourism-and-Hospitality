<?php

namespace Database\Factories;

use App\Models\Innovillage;
use App\Models\InnovillageTeam;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Innovillage>
 */
class InnovillageFactory extends Factory
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
            'year' => $this->faker->year(),
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Innovillage $innovillage) {
            Photo::factory()->count(3)->create([
                "innovillage_id" => $innovillage->id,
            ]);
            InnovillageTeam::factory()->count(2)->create([
                "innovillage_id" => $innovillage->id,
            ]);
        });
    }
}
