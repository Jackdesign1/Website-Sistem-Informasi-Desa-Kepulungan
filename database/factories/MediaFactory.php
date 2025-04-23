<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $urls = fake()->randomElement(["berita1", "berita2", "berita3"]);
        return [
            'url' => "assets/images/$urls.png",
            'alt' => mt_rand(0, 1)? fake()->words(mt_rand(2, 6), true) : null,
        ];
    }
}
