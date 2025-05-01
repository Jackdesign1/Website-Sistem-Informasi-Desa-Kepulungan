<?php

namespace App\Livewire\Pages\Homepage;

use App\Models\News;
use App\Models\OperationalBudget;
use App\Models\VillageBudget;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Index extends Component
{
    public $selectedTab;
    public $selectedYear = null;
    public $years;

    public function mount()
    {
        $villageBudgetYears = VillageBudget::select("year")->distinct()->pluck("year");
        $operationalBudgetYears = OperationalBudget::select("year")->distinct()->pluck("year");
        
        $years = $villageBudgetYears->merge($operationalBudgetYears)->unique()->sortDesc()->values();
        $years = $years->map(function ($year) {
            return [
                "year" => $year,
                "label" => $year,
            ];
        });
        $this->years = $years->toArray();
        $currentYear = now()->year;
        $this->selectedYear = $years->firstWhere("year", $currentYear)["year"] ?? $years->first()["year"] ?? null;
    }

    public function reports() {
        return News::onlyReports()
            ->onlyPublish()
            ->latest('updated_at')
            ->take(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.homepage.index');
    }
}
