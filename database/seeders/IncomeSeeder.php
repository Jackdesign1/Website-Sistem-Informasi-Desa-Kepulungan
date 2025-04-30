<?php

namespace Database\Seeders;

use App\Models\Income;
use App\Models\IncomeDetail;
use App\Models\IncomeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([2023, 2024, 2025] as $year) {
            $income = Income::create([
                'year' => "$year",
            ]);
            IncomeType::factory(mt_rand(2, 5))->create([
                'income_id' => $income->id,
            ])->each(function($type) {
                IncomeDetail::factory(mt_rand(1, 10))->create([
                    'income_type_id' => $type->id,
                ]);
            });
        }
    }
}
