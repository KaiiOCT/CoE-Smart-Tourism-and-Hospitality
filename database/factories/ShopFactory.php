<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->company(),
            'description' => $this->faker->paragraphs(3, true),
            'instagram' => $this->faker->userName(),
            'whatsapp' => $this->faker->phoneNumber(),
        ];
    }

    /**
     * Configure the factory to create photos for each shop.
     */
    public function configure(): self
    {
        return $this->afterCreating(function (Shop $shop) {
            \App\Models\Photo::factory()->count(3)->create([
                'shop_id' => $shop->id,
            ]);
        });
    }
}
