<?php

namespace App\Livewire\Pages\Budget;

use App\Models\OperationalBudget;
use App\Models\VillageBudget;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Budget extends Component
{
    public bool $withChart;
    public $onlyPreview;
    
    public $year;
    public $budgetChart;

    public $silpa;
    public $villageBudget;
    public $operationalBudget;

    #[Computed()]
    public function villageBudget() {
        return VillageBudget::where("year", $this->year)->first();
    }

    public function getVillageBudgetProperty()
    {
        $villageBudget = $this->villageBudget;
        if ($villageBudget) {
            return $villageBudget->details->sum("value");
        }
        return 0;
    }
    public function getOperationalBudgetProperty()
    {
        $operationalBudget = OperationalBudget::where("year", $this->year)->first();
        if ($operationalBudget) {
            return $operationalBudget->operationalDetails->sum("value");
        }
        return 0;
    }

    public function getBudgetChartProperty()
    {
        $villageBudget = $this->villageBudget;
        $operationalBudget = $this->operationalBudget;

        return [
            "type" => "pie",
            "data" => [
                "labels" => ["Pembelanjaan", "Pelaksanaan", "Pendapatan"],
                "datasets" => [
                    [
                        "label" => "Total",
                        "data" => [0, $operationalBudget, $villageBudget],
                        "backgroundColor" => [
                            "#FF6384",  // Red
                            "#36A2EB",  // Blue
                            "#4BC0C0",  // Green
                        ],
                    ]
                ]
            ],
            "options" => [
                "plugins" => [
                    "title" => [
                        "display" => true,
                    ],
                    "legend" => [
                        "position" => "right",
                        "labels" => [
                            "font" => [
                                "size" => 18,
                            ],
                        ],
                    ]
                ]
            ]
        ];
    }

    public function updatedYear()
    {
        $this->budgetChart = $this->getBudgetChartProperty();
    }

    public function mount($withChart = false, $year)
    {
        $this->withChart = $withChart !== "false"? true : false;
        $this->year = $year;

        $this->silpa = $this->villageBudget->silpa ?? 0;
        $this->villageBudget = $this->getVillageBudgetProperty();
        $this->operationalBudget = $this->getOperationalBudgetProperty();
        
        $this->budgetChart = $this->getBudgetChartProperty();
    }

    public function render()
    {
        return view("livewire.pages.budget.budget", [
            // 'villageBudget' => $this->getVillageBudgetProperty(),
            // 'operationalBudget' => $this->getOperationalBudgetProperty(),
        ]);
    }

    public function placeholder() {
        return '<div class="w-full border shadow-lg stats rounded-xl">
            <div class="stat">
                <div class="stat-title">APBDes ---- Pembelanjaan</div>
                <div class="h-8 stat-value skeleton text-dark"></div>
            </div>
            <div class="stat">
                <div class="stat-title">APBDes ---- Pelaksanaan</div>
                <div class="h-8 stat-value skeleton text-dark"></div>
            </div>
            <div class="stat">
                <div class="stat-title">APBDes ---- Pendapatan</div>
                <div class="h-8 stat-value skeleton text-dark"></div>
            </div>
        </div>';
    }
}
