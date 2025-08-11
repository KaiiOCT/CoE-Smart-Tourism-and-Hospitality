<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InternalMember>
 */
class InternalMemberFactory extends Factory
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
            'position' => $this->faker->jobTitle(),
            'education' => $this->faker->randomElement(['Bachelor', 'Master', 'PhD']),
            'email' => $this->faker->unique()->safeEmail(),
            'linkedin' => $this->faker->url(), // Contoh: "https://linkedin.com/in/example"
            'instagram' => $this->faker->userName(), // Contoh: "example_user"
            'study_program' => $this->faker->randomElement(['Computer Science', 'Engineering', 'Mathematics']),
            'research_field' => $this->faker->sentence(3), // Contoh: "Artificial Intelligence"
            'profile_picture' => $this->faker->imageUrl(200, 200, 'people', true, 'Profile'), // Link gambar profil
        ];
    }
}
