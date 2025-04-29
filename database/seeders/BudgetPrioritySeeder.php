<?php

namespace Database\Seeders;

use App\Models\BudgetPriority;
use App\Models\BudgetPriorityDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BudgetPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([2023, 2024, 2025] as $year) {
            $priority = BudgetPriority::create([
                'year' => "$year",
            ]);
            BudgetPriorityDetail::factory(mt_rand(2, 8))->create([
                'budget_priority_id' => $priority->id,
            ]);
        };
    }
}
