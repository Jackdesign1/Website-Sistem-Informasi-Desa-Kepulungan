<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BudgetPriorityDetail>
 */
class BudgetPriorityDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'budget_priority_id' => \App\Models\BudgetPriority::factory(),
            'priority_name' => $this->faker->word(),
            'value' => $this->faker->numberBetween(1000000, 999999999),
        ];
    }
}
