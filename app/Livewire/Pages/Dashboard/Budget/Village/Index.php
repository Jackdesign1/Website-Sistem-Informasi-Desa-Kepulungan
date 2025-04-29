<?php

namespace App\Livewire\Pages\Dashboard\Budget\Village;

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

    public function villageBudgets() {
        $villageBudgets = VillageBudget::latest('year')->with('details')->get();
        $chunkedBudgets = $villageBudgets->chunk(2);
        return $villageBudgets;
    }

    public function delete($key) {
        VillageBudget::destroy(decrypt($key));
        $this->info('Data anggaran berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.pages.dashboard.budget.village.index', [
            'villageBudgets' => $this->villageBudgets()
        ]);
    }
}
