<?php

namespace App\Livewire\Pages\Dashboard\Budget\Income;

use App\Models\Income;
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

    public function incomes() {
        $incomes = Income::latest('year')->with('details')->get();
        return $incomes;
    }

    public function delete($key) {
        Income::destroy(decrypt($key));
        $this->info('Anggaran pendapatan berhasil dihapus');
    }
    
    public function render()
    {
        return view('livewire.pages.dashboard.budget.income.index', [
            'incomes' => $this->incomes()
        ]);
    }
}
