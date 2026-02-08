<?php

namespace App\Livewire\Pages\Dashboard\Budget\Operational;

use App\Models\Income;
use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\OperationalBudget;

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

    public function operationals() {
        $operationals = OperationalBudget::latest('year')->with('operationalTypes', 'operationalTypes.details', 'operationalDetails')->get();
        return $operationals;
    }

    public function delete($key) {
        OperationalBudget::destroy(decrypt($key));
        $this->info('Anggaran pendapatan berhasil dihapus');
    }

    public function render()
    {
        $operationals = $this->operationals();
        $chunkedOperationals = collect([
            $operationals->filter(function ($item, $key) {
                return $key % 2 === 0; // odd index (0-based)
            })->values(),
            $operationals->filter(function ($item, $key) {
                return $key % 2 === 1; // even index (0-based)
            })->values(),
        ]);
        return view('livewire.pages.dashboard.budget.operational.index', [
            'operationals' => $operationals,
            'chunkedOperationals' => $chunkedOperationals
        ]);
    }
}
