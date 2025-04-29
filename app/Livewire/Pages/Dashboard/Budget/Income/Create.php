<?php

namespace App\Livewire\Pages\Dashboard\Budget\Income;

use App\Models\Income;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    #[Validate('required|date_format:Y|unique:incomes,year')]
    public $year;

    #[Validate([
        'incomes.*.income_name' => 'required|string',
        'incomes.*.value' => 'required',
    ])]
    public $incomes = [
        [
            'income_name' => 'Pendapatan Transfer',
            'value' => null,
        ], 
        [
            'income_name' => 'Pendapatan Asli Desa',
            'value' => null,
        ], 
        [
            'income_name' => 'APBDes Pelaksanaan',
            'value' => null,
        ], 
    ];

    public function addDetailIncome() {
        $this->incomes[] = [
            'income_name' => null,
            'value' => null,
        ];
    }

    public function removeDetailIncome($index) {
        unset($this->incomes[$index]);
    }

    public function resetPage() {
        $this->reset();
    }

    public function create() {
        $this->validate();
        try {
            $income = Income::create([
                'year' => $this->year,
            ]);

            $income->details()->createMany($this->incomes);

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
        return view('livewire.pages.dashboard.budget.income.create');
    }
}
