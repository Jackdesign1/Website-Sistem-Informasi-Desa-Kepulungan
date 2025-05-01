<?php

namespace App\Livewire\Pages\Budget;

use App\Models\OperationalBudget;
use App\Models\VillageBudget;
use Livewire\Component;

class Budget extends Component
{
    public $withChart;
    public $selectedYear;
    public $years;

    public $budgetChart;

    public function mount($withChart = false)
    {
        $this->withChart = $withChart;
        
        $villageBudgetYears = VillageBudget::select('year')->distinct()->pluck('year');
        $operationalBudgetYears = OperationalBudget::select('year')->distinct()->pluck('year');
        
        $years = $villageBudgetYears->merge($operationalBudgetYears)->unique()->sortDesc()->values();
        $years = $years->map(function ($year) {
            return [
                'year' => $year,
                'label' => $year,
            ];
        });

        $this->years = $years->toArray();

        $currentYear = now()->year;
        $this->selectedYear = $years->firstWhere('year', $currentYear) ?? $years->first() ?? null;

        $this->budgetChart = [
            'type' => 'pie',
            'data' => [
                'labels' => ['Mary', 'Joe', 'Ana'],
                'datasets' => [
                    [
                        'label' => '# of Votes',
                        'data' => [12, 19, 3],
                        // 'backgroundColor' => array_map(function () {
                        //     $r = rand(160, 240);
                        //     $g = rand(160, 240);
                        //     $b = rand(160, 240);
                        //     $a = 1;

                        //     return "rgba($r, $g, $b, $a)";
                        // }, range(1, 3)),
                    ]
                ]
            ],
            'options' => [
                'plugins' => [
                    'title' => [
                        'display' => true,
                    ],
                    'legend' => [
                        'position' => 'right',
                        'labels' => [
                            'font' => [
                                'size' => 24,
                            ],
                        ],
                    ]
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.pages.budget.budget');
    }
}
