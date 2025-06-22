<?php

namespace Database\Seeders;

use App\Models\VillageProgram;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\VillageProgramDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VillageProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('village_programs')->delete();
        DB::table('village_program_details')->delete();

        // Generate 5 unique random years between 2010 and 2024
        $years = [];
        while (count($years) < 5) {
            $year = rand(2010, 2024);
            if (!in_array($year, $years)) {
            $years[] = $year;
            }
        }

        foreach ($years as $value) {
            $villageProgram = VillageProgram::create([
                'year' => $value
            ]);

            VillageProgramDetail::factory(mt_rand(3, 8))->create([
                'village_program_id' => $villageProgram->id
            ]);
        }
    }
}
