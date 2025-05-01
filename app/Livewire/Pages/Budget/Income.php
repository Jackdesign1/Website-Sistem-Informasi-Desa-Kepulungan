<?php

namespace App\Livewire\Pages\Budget;

use App\Models\VillageBudget;
use Livewire\Component;

class Income extends Component
{
    public $withChart = false;
    
    public $year;
    public $villageBudgetChart;
    public $villageBudget;

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

        $this->villageBudget = VillageBudget::firstWhere('year', $this->year)->load('details');
        $this->villageBudget->total = $this->villageBudget->details->sum('value');
        
        $chartData = [];

        $labels = $this->villageBudget->details->pluck('type')->toArray();

        $chartData = [
            [
            'label' => 'Pendapatan Desa',
            'data' => $this->villageBudget->details->map(function ($detail) {
                return $detail->value;
            })->toArray(),
                'backgroundColor' => collect($labels)->map(function () {
            return $this->generateColor();
            })->toArray(),
            ],
        ];

        $this->villageBudgetChart = [
            'type' => 'doughnut',
            'data' => [
            'labels' => $labels,
            'datasets' => $chartData,
            ],
            'options' => [
            'plugins' => [
                'title' => [
                'display' => true,
                'text' => "Pendapatan Desa Tahun {$this->year}",
                ],
                'legend' => [
                'display' => true,
                'position' => 'top',
                ],
            ],
            ],
        ];

        // dd($this->villageBudgetChart);
    }

    public function render()
    {
        return view('livewire.pages.budget.income');
    }
}
