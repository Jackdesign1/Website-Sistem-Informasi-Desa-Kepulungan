<?php

namespace App\Livewire\Pages\Dashboard\Budget\Village;

use App\Models\VillageBudget;
use App\Models\VillageBudgetDetail;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;

    // this is the id for VillageBudget
    public $key;

    public $originalYear;
    public $year;
    #[Validate('required')]
    public $silpa = null;

    #[Validate([
        'detailBudgets.*.type' => 'required|string',
        'detailBudgets.*.value' => 'required',
    ])]
    public $detailBudgets = [
        [
            'id' => null,
            'type' => 'APBDes Pembelanjaan',
            'value' => null,
        ], 
        [
            'id' => null,
            'type' => 'APBDes Pelaksanan',
            'value' => null,
        ], 
        [
            'id' => null,
            'type' => 'APBDes Pembelian',
            'value' => null,
        ], 
    ];

    public function rules() {
        $yearRule = 'required|date_format:Y';
        if ($this->originalYear !== $this->year) {
            $yearRule .= '|unique:village_budgets,year';
        }
        return [
            'year' => $yearRule,
        ];
    }

    public function addDetailBudget() {
        $this->detailBudgets[] = [
            'type' => null,
            'value' => null,
        ];
    }

    public function removeDetailBudget($index) {
        try {
            if (empty($this->detailBudgets[$index]['id'])) {
                unset($this->detailBudgets[$index]);
                return;
            }
            VillageBudgetDetail::find($this->detailBudgets[$index]['id'])->delete();
            $this->success('Detail anggaran berhasil dihapus');
        } catch (\Exception $e) {
            $this->error('Error', 'Terjadi error saat menghapus data');
        } finally {
            unset($this->detailBudgets[$index]);
        }
    }

    public function resetPage() {
        $this->reset();
    }

    public function mount($key) {
        $this->key = $key;
        $villageBudget = VillageBudget::find(decrypt($this->key));
        if ($villageBudget) {
            $this->year = $villageBudget->year;
            $this->originalYear = $villageBudget->year;
            $this->silpa = $villageBudget->silpa;
            $this->detailBudgets = $villageBudget->details()->get()->toArray();
        }
    }

    public function edit() {
        $this->validate();
        try {
            $villageBudget = VillageBudget::find(decrypt($this->key));

            $villageBudget->update([
                'year' => $this->year,
                'silpa' => $this->silpa, 
            ]);

            foreach ($this->detailBudgets as $detailbudget) {
                VillageBudgetDetail::updateOrCreate ([
                    'id' => $detailbudget['id']?? null,
                ], [
                    'village_budget_id' => $villageBudget->id,
                    'type' => $detailbudget['type'],
                    'value' => $detailbudget['value'],
                ]);
            }
            $this->redirectRoute('dashboard.budget.village.index', navigate: true);
            $this->success('Anggaran berhasil diubah');
        } catch (\Exception $e) {
            $this->error('Error', 'Terjadi error saat mengubah data'.$e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire..pages.dashboard.budget.village.edit');
    }
}
