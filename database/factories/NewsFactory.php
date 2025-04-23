<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        $types = fake()->randomelement(['news', 'report']);
        $title = fake()->words(mt_rand(3, 7), true);
        $description = $types == 'report'? fake()->paragraphs(mt_rand(1, 4), true) : null;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'type' => $types,
            'description' => $description,
            'status' => fake()->randomElement(['draft', 'publish']),
            'content' => fake()->paragraphs(mt_rand(8, 15), true)
        ];
    }
}
