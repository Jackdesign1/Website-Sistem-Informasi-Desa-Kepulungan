<?php

namespace Database\Seeders;

use App\Models\VillageBudget;
use App\Models\VillageBudgetDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageBudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([2023, 2024, 2025] as $year) {
            $village = VillageBudget::create([
                'silpa' => mt_rand(1_000_000, 999_999_999),
                'year' => "$year-01-01",
            ]);
        
            foreach (['APBDes Pembelanjaan', 'APBDes Pelaksanaan', 'APBDes Pendapatan'] as $type) {
                VillageBudgetDetail::factory()->create([
                    'type' => $type,
                    'village_budget_id' => $village->id
                ]);
            }
        }
    }
}
