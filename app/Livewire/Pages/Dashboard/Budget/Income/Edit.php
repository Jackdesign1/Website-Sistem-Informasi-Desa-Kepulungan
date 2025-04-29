<?php

namespace App\Livewire\Pages\Dashboard\Budget\Income;

use App\Models\Income;
use App\Models\IncomeDetail;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;

    // this is the id for Income
    public $key;

    public $originalYear;
    public $year;

    #[Validate([
        'incomes.*.income_name' => 'required|string',
        'incomes.*.value' => 'required',
    ])]
    public $incomes = [
        [
            'id' => null,
            'income_name' => 'Pendapatan Transfer',
            'value' => null,
        ], 
    ];

    public function rules() {
        $yearRule = 'required|date_format:Y';
        if ($this->originalYear !== $this->year) {
            $yearRule .= '|unique:incomes,year';
        }
        return [
            'year' => $yearRule,
        ];
    }

    public function addIncome() {
        $this->incomes[] = [
            'income_name' => null,
            'value' => null,
        ];
    }

    public function removeIncome($index) {
        try {
            if (empty($this->incomes[$index]['id'])) {
                unset($this->incomes[$index]);
                return;
            }
            IncomeDetail::find($this->incomes[$index]['id'])->delete();
            $this->success('Detail pendapatan berhasil dihapus');
        } catch (\Exception $e) {
            $this->error('Error', 'Terjadi error saat menghapus data');
        } finally {
            unset($this->incomes[$index]);
        }
    }

    public function resetPage() {
        $this->reset();
    }

    public function mount($key) {
        $this->key = $key;
        $income = Income::find(decrypt($this->key));
        if ($income) {
            $this->year = $income->year;
            $this->originalYear = $income->year;
            $this->incomes = $income->details()->get()->toArray();
        }
    }

    public function edit() {
        $this->validate();
        try {
            $income = Income::find(decrypt($this->key));

            $income->update([
                'year' => $this->year,
            ]);

            foreach ($this->incomes as $incomeData) {
                IncomeDetail::updateOrCreate ([
                    'id' => $incomeData['id']?? null,
                ], [
                    'income_id' => $income->id,
                    'income_name' => $incomeData['income_name'],
                    'value' => $incomeData['value'],
                ]);
            }
            // $this->redirectRoute('dashboard.budget.income.index', navigate: true);
            $this->success('Pendapatan berhasil diubah');
        } catch (\Exception $e) {
            $this->error('Error', 'Terjadi error saat mengubah data'.$e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.budget.income.edit');
    }
}
