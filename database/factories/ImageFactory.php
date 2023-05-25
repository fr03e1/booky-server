<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'preview_image' => $this->faker->url,
            'image_2' => $this->faker->url,
            'image_3' => $this->faker->url,
            'image_4' => $this->faker->url,
        ];
    }
}
