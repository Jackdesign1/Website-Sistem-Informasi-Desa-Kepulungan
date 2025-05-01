<?php

namespace App\Livewire\Pages\Budget;

use App\Models\VillageBudget;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Index extends Component
{   
    public array $myChart;

    public $belanjaChart;

    public function mount()
    {
        $this->belanjaChart = [
            'type' => 'doughnut',
            'data' => [
                'labels' => ['Belanja 1', 'Belanja 2', 'Belanja 3'],
                'datasets' => [
                    [
                        'label' => '# of Votes',
                        'data' => [11000000, 100000000, 123009000],
                        'backgroundColor' => array_map(function () {
                            $r = rand(160, 240);
                            $g = rand(160, 240);
                            $b = rand(160, 240);
                            $a = 1;

                            return "rgba($r, $g, $b, $a)";
                        }, range(1, 3)),
                    ]
                ]
            ],
        ];
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

    public function getIncomes() {
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

    // public function get

    public function render()
    {
        return view('livewire.pages.budget.index', [
            'villageBudgets' => $this->getVillageBudgets(),
            'incomes' => $this->getIncomes(),
        ]);
    }
}
