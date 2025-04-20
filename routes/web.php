<?php

use App\Livewire\Pages\Budget\Index as BudgetIndex;
use App\Livewire\Pages\Dashboard\Apparatus\Index as ApparatusIndex;
use App\Livewire\Pages\Homepage\Index;
use App\Livewire\Pages\VillageProfile\Index as VillageProfileIndex;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::view('/', 'welcome');

Route::prefix('dashboard')->middleware(['auth'])->group(function() {
    Route::view('/', 'dashboard')
        ->name('dashboard');

    Route::view('/aparatur', ApparatusIndex::class)
        ->name('apparatus');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('volt', 'pages.test.counter');

Route::get('/', Index::class)->name('homepage');

Route::get('/profil-desa', VillageProfileIndex::class)->name('village-profile');

Route::get('/anggaran', BudgetIndex::class)->name('budget');

require __DIR__.'/auth.php';
