<?php

namespace App\Livewire\Pages\Dashboard\Budget\Village;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\VillageBudget;

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
        return $villageBudgets;
    }

    public function delete($key) {
        VillageBudget::destroy(decrypt($key));
        $this->info('Data anggaran berhasil dihapus');
    }

    public function render()
    {
        $villageBudgets = $this->villageBudgets();
        $chunkedVillageBudgets = collect([
            $villageBudgets->filter(function ($item, $key) {
                return $key % 2 === 0; // odd index (0-based)
            })->values(),
            $villageBudgets->filter(function ($item, $key) {
                return $key % 2 === 1; // even index (0-based)
            })->values(),
        ]);
        return view('livewire.pages.dashboard.budget.village.index', [
            'villageBudgets' => $villageBudgets,
            'chunkedVillageBudgets' => $chunkedVillageBudgets
        ]);
    }
}
