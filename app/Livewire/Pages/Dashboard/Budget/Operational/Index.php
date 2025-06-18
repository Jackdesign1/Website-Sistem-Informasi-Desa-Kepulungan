<?php

namespace App\Livewire\Pages\Dashboard\Budget\Operational;

use App\Models\Income;
use App\Models\OperationalBudget;
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
        return view('livewire.pages.dashboard.budget.operational.index', [
            'operationals' => $operationals,
            'chunkedOperationals' => $operationals->chunk(2)
        ]);
    }
}
