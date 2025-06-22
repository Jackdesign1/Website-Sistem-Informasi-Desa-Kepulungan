<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\Media;
use App\Models\Apparatus;
use App\Models\JobVacancy;
use App\Models\VillageBudget;
use App\Models\VillageBudgetDetail;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $this->call([
        //     VillageBudgetSeeder::class,
        //     BudgetPrioritySeeder::class,
        //     OperationalBudgetSeeder::class,
        // ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Kim Kepulungan',
            'email' => 'kim@kepulungan.desa.id',
        ]);
        User::factory()->create([
            'name' => 'Fahrudin',
            'email' => 'fahrudin@kepulungan.desa.id',
        ]);

        // Apparatus::factory(10)->create();

        // News::factory(40)->create()->each(function($news) {
        //     Media::factory(mt_rand(2, 5))->create([
        //         'news_id' => $news->id,
        //         'type' => 'image'
        //     ]);
        //     if ($news->type == 'report') {
        //         Media::factory(mt_rand(2, 5))->create([
        //             'news_id' => $news->id,
        //             'type' => 'file'
        //         ]);
        //     }
        // });

        // JobVacancy::factory(20)->create();

    }
}
