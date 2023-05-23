<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Image;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text,
            'count' => 1,
            'image_id' => Image::get()->random()->id,
            'publisher_id' => Publisher::get()->random()->id,
            'category_id' => Category::get()->random()->id,
            'price' => 1500.00,
            'year' => 2020,
            'binding' => 'твердый',
            'ISBN' => '12fas12',
        ];
    }
}
