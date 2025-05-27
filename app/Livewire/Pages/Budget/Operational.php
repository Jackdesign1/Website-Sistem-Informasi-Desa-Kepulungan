<?php

namespace App\Livewire\Pages\Budget;

use App\Models\OperationalBudget;
use Livewire\Component;

class Operational extends Component
{
    public $withChart = false;
    
    public $year;
    public $operationalChart;
    public $operationalBudget;

    public function generateColor() {
        $r = rand(0, 255);
        $g = rand(0, 255);
        $b = rand(0, 255);
        $a = 1;

        // Ensure higher contrast and prevent dark colors
        if ($r * 0.299 + $g * 0.587 + $b * 0.114 < 128) { // Dark colors
            $r = rand(128, 255);
            $g = rand(128, 255);
            $b = rand(128, 255);
        }

        return "rgba($r, $g, $b, $a)";
    }

    public function mount($year, $withChart = false) {
        $this->withChart = $withChart;
        $this->year = $year;

        $this->operationalBudget = OperationalBudget::firstWhere('year', $this->year);
        if ($this->operationalBudget) {
            $this->operationalBudget->load('operationalDetails', 'operationalTypes.details');
            $this->operationalBudget->total = $this->operationalBudget->operationalDetails->sum('value');
            
            $chartData = [];
    
            $labels = $this->operationalBudget->operationalTypes->pluck('operational_type_name')->toArray();
    
            $chartData = [
                [
                'label' => 'Anggaran Pelaksanaan',
                'data' => $this->operationalBudget->operationalTypes->map(function ($type) {
                    return $type->details->sum('value');
                })->toArray(),
                    'backgroundColor' => collect($labels)->map(function () {
                return $this->generateColor();
                })->toArray(),
                ],
            ];
    
            $this->operationalChart = [
                'type' => 'doughnut',
                'data' => [
                'labels' => $labels,
                'datasets' => $chartData,
                ],
                'options' => [
                'plugins' => [
                    'title' => [
                    'display' => true,
                    'text' => "Anggaran Pelaksanaan Tahun {$this->year}",
                    ],
                    'legend' => [
                    'display' => true,
                    'position' => 'top',
                    ],
                ],
                ],
            ];
        }
    }

    public function render()
    {
        return view('livewire.pages.budget.operational');
    }
}
