<?php

namespace Database\Factories;

use App\Models\BookBind;
use App\Models\Format;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Script;
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
    public function definition()
    {
        return [
            //
            'title' => fake()->word,
            'description' => fake()->text,
            'pageNum' => fake()->numberBetween(30, 3000),
            'script_id' => Script::factory()->create(),
            'bookbind_id' => BookBind::factory()->create(),
            'format_id' => Format::factory()->create(),
            'publisher_id' => Publisher::factory()->create(),
            'language_id' => Language::factory()->create(),
            'publishDate' => fake()->year,
            'isbn' => fake()->isbn13(),
            'samples' => fake()->numberBetween(100, 100),
            'borrowedSamples' => 0,
            'reservedSamples' => 0,
        ];
    }
}
