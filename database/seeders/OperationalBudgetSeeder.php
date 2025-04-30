<?php

namespace Database\Seeders;

use App\Models\OperationalBudget;
use App\Models\OperationalBudgetType;
use App\Models\OperationalBudgetTypeDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationalBudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([2023, 2024, 2025] as $year) {
            $operationalBudget = OperationalBudget::create([
                'year' => $year,
            ]);
            OperationalBudgetType::factory(mt_rand(2, 5))->create([
                'operational_budget_id' => $operationalBudget->id,
            ])->each(function($type) {
                OperationalBudgetTypeDetail::factory(mt_rand(1, 10))->create([
                    'operational_budget_type_id' => $type->id,
                ]);
            });
        }
    }
}
