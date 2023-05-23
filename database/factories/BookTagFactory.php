<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookTag>
 */
class BookTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::get()->random()->id,
            'tag_id' => Tag::get()->random()->id,
        ];
    }
}
