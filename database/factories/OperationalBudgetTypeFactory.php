<?php

namespace Database\Factories;

use App\Models\OperationalBudget;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OperationalBudgetType>
 */
class OperationalBudgetTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'operational_budget_id' => OperationalBudget::factory(),
            'operational_type_name' => $this->faker->word,
        ];
    }
}
