<?php

namespace App\Livewire\Pages\Budget;

use App\Models\OperationalBudget;
use App\Models\VillageBudget;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest'), Title('Anggaran')]
class Index extends Component
{   
    public array $myChart;
    public $belanjaChart;

    public $years = [];
    public $selectedYear = null;

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

    public function randomBackgroundColors() {
        return array_map(function () {
            $r = rand(150, 200); // soft red range
            $g = rand(150, 200); // soft green range
            $b = rand(150, 200); // soft blue range
            $a = 0.6; // semi-transparent, like Tailwind 300 shades
            return "rgba($r, $g, $b, $a)";
        }, range(1, 3));
    }

    public function getVillageBudgets() {
        return VillageBudget::where('year', date('Y'))
        ->with(['details' => function ($query) {
            $query->select('id', 'village_budget_id', 'type', 'value');
        }])
        ->get()
        ->map(function ($budget) {
            $budget->details = $budget->details->map(function ($detail) {
                $detail->backgroundColor = $this->randomBackgroundColors();
                return $detail;
            });
            return $budget;
        });
    }

    public function render()
    {
        return view('livewire.pages.budget.index', [
            // 'villageBudgets' => $this->getVillageBudgets(),
            // 'incomes' => $this->getIncomes(),
        ]);
    }
}
