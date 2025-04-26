<?php

namespace App\Livewire\Pages\Dashboard\Budget\Village;

use App\Models\VillageBudget;
use Livewire\Component;

class Index extends Component
{
    public $createModal = false;

    public $year;
    public $datePickerConfig = [
        'dateFormat' => 'Y',           // Value format sent to backend (year only)
        'altFormat' => 'Y',            // Display format
        // 'plugins' => ['yearSelectPlugin'], // Use year selector plugin
        // 'defaultDate' => now()->format('Y'), // Optional: default year
    ];
    public $silpa;

    public $detailBudget = [
        ['type' => 'APBDes Pembelanjaan', 'value'],
        ['type' => 'APBDes Pelaksanaan', 'value'],
        ['type' => 'APBDes Pendapatan', 'value'],
    ];

    public function villageBudgets() {
        return VillageBudget::latest('year')->with('detail')->get();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.budget.village.index', [
            'village_budgets' => $this->villageBudgets()
        ]);
    }
}
