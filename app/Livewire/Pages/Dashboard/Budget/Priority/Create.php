<?php

namespace App\Livewire\Pages\Dashboard\Budget\Priority;

use App\Models\BudgetPriority;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    #[Validate('required|date_format:Y|unique:budget_priorities,year')]
    public $year;

    #[Validate([
        'detailBudgetPriorities.*.priority_name' => 'required|string',
        'detailBudgetPriorities.*.value' => 'required',
    ])]
    public $detailBudgetPriorities = [
        [
            'priority_name',
            'value',
        ], 
        [
            'priority_name',
            'value',
        ], 
    ];

    public function addDetailBudget() {
        $this->detailBudgetPriorities[] = [
            'priority_name' => null,
            'value' => null,
        ];
    }

    public function removeDetailBudget($index) {
        unset($this->detailBudgetPriorities[$index]);
    }

    public function resetPage() {
        $this->reset();
    }

    public function create() {
        $this->validate();
        try {
            $budgetPriority = BudgetPriority::create([
                'year' => $this->year,
            ]);

            $budgetPriority->details()->createMany($this->detailBudgetPriorities);
            $this->reset();
            $this->dispatch('refresh');
            $this->dispatch('closeCreateModal');
            $this->success('Berhasil menambahkan anggaran prioritas');
        } catch (\Exception $e) {
            $this->error('Error', 'Terjadi error saat menambahkan anggaran prioritas');
        }
    }

    public function render()
    {
        return view('livewire..pages.dashboard.budget.priority.create');
    }
}
