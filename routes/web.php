<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Homepage\Index;
use App\Livewire\Pages\Budget\Index as BudgetIndex;
use App\Livewire\Pages\Bumdes\Index as BumdesIndex;
use App\Livewire\Pages\Contact\Index as ContactIndex;
use App\Livewire\Pages\Information\NewsContent;
use App\Livewire\Pages\Information\Index as InformationIndex;
use App\Livewire\Pages\Dashboard\Apparatus\Index as ApparatusIndex;
use App\Livewire\Pages\Dashboard\Budget\Operational\Create as OperationalCreate;
use App\Livewire\Pages\Dashboard\Budget\Operational\Edit as OperationalEdit;
use App\Livewire\Pages\Dashboard\Information\News\Edit as NewsEdit;
use App\Livewire\Pages\VillageProfile\Index as VillageProfileIndex;
use App\Livewire\Pages\Dashboard\Budget\Operational\Index as OperationalIndex;
use App\Livewire\Pages\Dashboard\Budget\Priority\Edit as PriorityEdit;
use App\Livewire\Pages\Dashboard\Information\News\Index as NewsIndex;
use App\Livewire\Pages\Dashboard\Budget\Village\Index as VillageIndex;
use App\Livewire\Pages\Dashboard\Information\News\Create as NewsCreate;
use App\Livewire\Pages\Dashboard\Information\Report\Edit as ReportEdit;
use App\Livewire\Pages\Dashboard\Budget\Priority\Index as PriorityIndex;
use App\Livewire\Pages\Dashboard\Budget\Village\Edit;
use App\Livewire\Pages\Dashboard\Information\Jobvacancy\Create;
use App\Livewire\Pages\Dashboard\Information\Jobvacancy\Edit as JobvacancyEdit;
use App\Livewire\Pages\Dashboard\Information\Report\Index as ReportIndex;
use App\Livewire\Pages\Dashboard\Information\Report\Create as ReportCreate;
use App\Livewire\Pages\Dashboard\Information\JobVacancy\Index as JobVacancyIndex;
use App\Livewire\Pages\Galery\Index as GaleryIndex;
use App\Models\JobVacancy;

// Route::view('/', 'welcome');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function() {
    Route::view('/', 'dashboard')
        ->name('index');

    Route::get('/aparatur', ApparatusIndex::class)
        ->name('apparatus');

    Route::prefix('anggaran')->name('budget.')->group(function() {
        // Route::get('/', BudgetIndex::class)
        //     ->name('index');
        Route::prefix('desa')->name('village.')->group(function() {
            Route::get('/', VillageIndex::class)
                ->name('index');
            // Route::get('/create', \App\Livewire\Pages\Dashboard\Budget\Village\Create::class)
            //     ->name('create');
            Route::get('/edit/{key}', Edit::class)
                ->name('edit');
        });
        Route::prefix('prioritas')->name('priority.')->group(function() {
            Route::get('/', PriorityIndex::class)
                ->name('index');
            // Route::get('/create', \App\Livewire\Pages\Dashboard\Budget\Priority\Create::class)
            //     ->name('create');
            Route::get('edit/{key}', PriorityEdit::class)
                ->name('edit');
        });
        Route::prefix('operasional')->name('operational.')->group(function() {
            Route::get('/', OperationalIndex::class)
                ->name('index');
            Route::get('/create', OperationalCreate::class)
                ->name('create');
            Route::get('/edit/{key}', OperationalEdit::class)
                ->name('edit');
        });
    });

    Route::prefix('informasi')->name('information.')->group(function() {
        Route::prefix('/berita')->name('news.')->group(function() {
            Route::get('/', NewsIndex::class)
                ->name('index');
            Route::get('/create', NewsCreate::class)
                ->name('create');
            Route::get('/edit/{key}', NewsEdit::class)
                ->name('edit');
        });
        Route::prefix('/laporan')->name('report.')->group(function() {
            Route::get('/', ReportIndex::class)
                ->name('index');
            Route::get('/create', ReportCreate::class)
                ->name('create');
            Route::get('/edit/{key}', ReportEdit::class)
                ->name('edit');
        });
        Route::prefix('/lowongan-kerja')->name('jobs-vacancy.')->group(function() {
            Route::get('/', JobVacancyIndex::class)
                ->name('index');
            Route::get('/create', Create::class)
                ->name('create');
            Route::get('/edit', JobvacancyEdit::class)
                ->name('edit');
        });
    });
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Volt::route('volt', 'pages.test.counter');


// Guest Route
Route::get('/', Index::class)->name('homepage');
Route::get('/profil-desa', VillageProfileIndex::class)->name('village-profile');
Route::get('/anggaran', BudgetIndex::class)->name('budget');
Route::prefix('informasi')->name('information.')->group(function() {
    Route::get('/', InformationIndex::class)->name('index');
    // type: news/report
    Route::get('/{type}/{slug}', NewsContent::class)->name('news-content');
});
Route::get('/galeri', GaleryIndex::class)->name('galery');
Route::get('/bumdes', BumdesIndex::class)->name('bumdes');
Route::get('/kontak', ContactIndex::class)->name('contact');

require __DIR__.'/auth.php';
