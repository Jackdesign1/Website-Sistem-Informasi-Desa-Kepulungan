<?php

use App\Livewire\Pages\Homepage\Index;
use App\Livewire\Pages\ProfileVillage\Index as ProfileVillageIndex;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('volt', 'pages.test.counter');

Route::get('/', Index::class)->name('homepage');

Route::get('/profil-desa', ProfileVillageIndex::class)->name('village-profile');

require __DIR__.'/auth.php';
