<?php

namespace App\Livewire\Pages\Dashboard\Budget\Village;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\VillageBudget;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use Toast;

    #[Validate('required|date_format:Y|unique:village_budgets,year')]
    public $year;
    #[Validate('required')]
    public $silpa = null;

    #[Validate([
        'detailBudgets.*.type' => 'required|string',
        'detailBudgets.*.value' => 'required',
    ])]
    public $detailBudgets = [
        [
            'type' => 'PAB',
            'value' => null,
        ],
        [
            'type' => 'DD',
            'value' => null,
        ],
        [
            'type' => 'BHPD',
            'value' => null,
        ],
        [
            'type' => 'ADD',
            'value' => null,
        ],
        [
            'type' => 'BKK',
            'value' => null,
        ],
    ];

    public function addDetailBudget() {
        $this->detailBudgets[] = [
            'type' => null,
            'value' => null,
        ];
    }

    public function removeDetailBudget($index) {
        unset($this->detailBudgets[$index]);
    }

    public function resetPage() {
        $this->reset();
    }

    public function create() {
        $this->validate();
        try {
            $villageBudget = VillageBudget::create([
                'year' => $this->year,
                'silpa' => $this->silpa,
            ]);

            $villageBudget->details()->createMany($this->detailBudgets);
            $this->reset();
            $this->dispatch('refresh');
            $this->dispatch('closeCreateModal');
            $this->success('Berhasil menambahkan data');
        } catch (\Exception $e) {
            $this->error('Error', 'Terjadi error saat menambahkan data');
        }
    }

    public function render()
    {
        return view('livewire..pages.dashboard.budget.village.create');
    }
}
