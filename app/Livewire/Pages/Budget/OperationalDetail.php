<?php

namespace App\Livewire\Pages\Budget;

use App\Models\OperationalBudget;
use Livewire\Component;

class OperationalDetail extends Component
{
    public $year;

    public function getOperationalBudgetProperty()
    {
        $operational = OperationalBudget::firstWhere('year', $this->year)->load('operationalTypes', 'operationalTypes.details');
        $operational->total = $operational->operationalDetails->sum('value');
        return $operational;
    }

    public function mount($year) 
    {
        $this->year = $year;
    }

    public function render()
    {
        return view('livewire.pages.budget.operational-detail', [
            'operationalBudget' => $this->getOperationalBudgetProperty(),
        ]);
    }
}
