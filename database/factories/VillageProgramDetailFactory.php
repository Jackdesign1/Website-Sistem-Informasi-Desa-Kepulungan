<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VillageProgramDetail>
 */
class VillageProgramDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->optional()->paragraph(),
            'status' => $this->faker->randomElement(['planned', 'in_progress', 'completed']),
            'budget' => $this->faker->optional()->numberBetween(1000000, 100000000),
            // 'realization' => $this->faker->optional()->numberBetween(0, 100000000),
            'start_date' => $this->faker->optional()->date(),
            'end_date' => $this->faker->optional()->date(),
        ];
    }
}
