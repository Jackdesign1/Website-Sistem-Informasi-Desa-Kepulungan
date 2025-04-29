<?php

namespace Database\Seeders;

use App\Models\Income;
use App\Models\IncomeDetail;
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
            IncomeDetail::factory(mt_rand(2, 8))->create([
                'income_id' => $income->id,
            ]);
        }
    }
}
