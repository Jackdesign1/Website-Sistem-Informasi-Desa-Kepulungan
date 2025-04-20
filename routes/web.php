<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Homepage\Index;
use App\Livewire\Pages\Budget\Index as BudgetIndex;
use App\Livewire\Pages\Information\NewsContent;
use App\Livewire\Pages\Information\Index as InformationIndex;
use App\Livewire\Pages\Dashboard\Apparatus\Index as ApparatusIndex;
use App\Livewire\Pages\VillageProfile\Index as VillageProfileIndex;
use App\Livewire\Pages\Dashboard\Budget\Income\Index as IncomeIndex;
use App\Livewire\Pages\Dashboard\Budget\Village\Index as VillageIndex;
use App\Livewire\Pages\Dashboard\Budget\Priority\Index as PriorityIndex;

// Route::view('/', 'welcome');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function() {
    Route::view('/', 'dashboard')
        ->name('index');

    Route::get('/aparatur', ApparatusIndex::class)
        ->name('apparatus');

    Route::prefix('anggaran')->name('budget.')->group(function() {
        // Route::get('/', BudgetIndex::class)
        //     ->name('index');
        Route::get('/desa', VillageIndex::class)
            ->name('village');
        Route::get('/prioritas', PriorityIndex::class)
            ->name('priority');
        Route::get('/pendapatan', IncomeIndex::class)
            ->name('income');
    });
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('volt', 'pages.test.counter');

Route::get('/', Index::class)->name('homepage');

Route::get('/profil-desa', VillageProfileIndex::class)->name('village-profile');

Route::get('/anggaran', BudgetIndex::class)->name('budget');

Route::prefix('informasi')->name('information.')->group(function() {
    Route::get('/', InformationIndex::class)->name('index');
    Route::get('/{type}/{slug}', NewsContent::class)->name('news-content');
});

require __DIR__.'/auth.php';
