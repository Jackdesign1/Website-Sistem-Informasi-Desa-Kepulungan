<?php

namespace App\Livewire\Pages\Dashboard\Budget\Priority;

use App\Models\BudgetPriority;
use App\Models\VillageBudget;
use Livewire\Component;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast;

    public $createModal = false;
    public $editModal = false;

    public $listeners = [
        'refresh' => '$refresh',
        'closeCreateModal'
    ];

    public function closeCreateModal() {
        $this->createModal = false;
    }

    public function budgetPriorities() {
        $budgetPriorities = BudgetPriority::latest('year')->with('details')->get();
        return $budgetPriorities;
    }

    public function delete($key) {
        BudgetPriority::destroy(decrypt($key));
        $this->info('Data anggaran prioritas berhasil dihapus');
    }
    
    public function render()
    {
        return view('livewire.pages.dashboard.budget.priority.index', [
            'budgetPriorities' => $this->budgetPriorities()
        ]);
    }
}
