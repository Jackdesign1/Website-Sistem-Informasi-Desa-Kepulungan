<?php

namespace App\Livewire\Pages\Dashboard\Budget\Priority;

use App\Models\BudgetPriority;
use App\Models\BudgetPriorityDetail;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;

    public $key;

    public $originalYear;
    public $year;

    #[Validate([
        'detailBudgetPriorities.*.priority_name' => 'required|string',
        'detailBudgetPriorities.*.value' => 'required',
    ])]
    public $detailBudgetPriorities = [
        [
            'priority_name',
            'value',
        ], 
        [
            'priority_name',
            'value',
        ], 
    ];

    public function rules() {
        $yearRule = 'required|date_format:Y';
        if ($this->originalYear !== $this->year) {
            $yearRule .= '|unique:budget_priorities,year';
        }
        return [
            'year' => $yearRule,
        ];
    }

    public function addDetailBudget() {
        $this->detailBudgetPriorities[] = [
            'priority_name' => null,
            'value' => null,
        ];
    }

    public function removeDetailBudget($index) {
        try {
            if (empty($this->detailBudgetPriorities[$index]['id'])) {
                unset($this->detailBudgetPriorities[$index]);
                return;
            }
            BudgetPriorityDetail::find($this->detailBudgetPriorities[$index]['id'])->delete();
            $this->success('Detail anggaran berhasil dihapus');
        } catch (\Exception $e) {
            $this->error('Error', 'Terjadi error saat menghapus data');
        } finally {
            unset($this->detailBudgetPriorities[$index]);
        }
    }

    public function resetPage() {
        $this->reset();
    }

    public function edit() {
        $this->validate();
        try {
            $budgetPriority = BudgetPriority::find(decrypt($this->key));
            $budgetPriority->update([
                'year' => $this->year,
            ]);

            foreach ($this->detailBudgetPriorities as $index => $detailBudgetPriority) {
                $budgetPriority->details()->updateOrCreate(
                    ['id' => $detailBudgetPriority['id']?? null],
                    [
                        'priority_name' => $detailBudgetPriority['priority_name'],
                        'value' => $detailBudgetPriority['value'],
                    ]
                );
            }
            $this->success('Berhasil mengubah prioritas anggaran');
        } catch (\Exception $e) {
            $this->error('Error', 'Terjadi error saat mengubah prioritas anggaran');
        }
    }

    public function mount($key){
        $this->key = $key;
        $budgetPriority = BudgetPriority::find(decrypt($this->key));
        $this->year = $budgetPriority->year;
        $this->originalYear = $budgetPriority->year;
        $this->detailBudgetPriorities = $budgetPriority->details()->get()->toArray();
    }
    
    public function render()
    {
        return view('livewire..pages.dashboard.budget.priority.edit');
    }
}
