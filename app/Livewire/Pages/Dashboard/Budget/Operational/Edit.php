<?php

namespace App\Livewire\Pages\Dashboard\Budget\Operational;

use App\Models\Income;
use App\Models\IncomeDetail;
use Illuminate\Support\Facades\DB;
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

    // #[Validate([
    //     'incomeTypes.*.income_type_name' => 'string',
    //     'incomeTypes.*.value' => 'integer',
    //     'incomeTypes.*.details.*.income_detail_name' => 'string',
    //     'incomeTypes.*.details.*.value' => 'integer',
    // ])]
    public $incomeTypes = [
        [
            'income_type_name' => null,
            'value' => null,
            'details' => [
                [
                    'income_detail_name' => null,
                    'value' => null
                ],
            ]
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

    public function addIncomeType() {
        $this->incomeTypes[] = [
            'income_type_name' => null,
            'value' => null,
            'details' => [
                [
                    'income_detail_name' => null,
                    'value' => null
                ],
            ]
        ];
    }

    public function addIncomeDetail($typeIndex) {
        $this->incomeTypes[$typeIndex]['details'][] = [
            'income_detail_name' => null,
            'value' => null
        ];
    }

    public function removeIncomeType($index) {
        $incomeTypeId = $this->incomeTypes[$index]['id'] ?? null;
        if ($incomeTypeId) {
            Income::find(decrypt($this->key))->incomeTypes()->where('id', $incomeTypeId)->delete();
        }
        unset($this->incomeTypes[$index]);
        $this->info('Berhasil menghapus data');
    }

    public function removeIncomeDetail($typeIndex, $detailIndex) {
        $incomeDetailId = $this->incomeTypes[$typeIndex]['details'][$detailIndex]['id'] ?? null;
        if ($incomeDetailId) {
            IncomeDetail::find($incomeDetailId)->delete();
        }
        unset($this->incomeTypes[$typeIndex]['details'][$detailIndex]);
        $this->info('Berhasil menghapus data');
    }

    public function resetPage() {
        $this->reset();
    }

    public function edit() {
        $this->validate();
        try {
            DB::beginTransaction();

            $income = Income::find(decrypt($this->key));

            $income->update([
                'year' => $this->year,
            ]);

            foreach ($this->incomeTypes as $incomeTypeData) {
                $incomeType = $income->incomeTypes()->updateOrCreate(
                    ['id' => $incomeTypeData['id'] ?? null],
                    [
                        'income_type_name' => $incomeTypeData['income_type_name'],
                        'value' => $incomeTypeData['value'],
                    ]
                );

                if (isset($incomeTypeData['details'])) {
                    foreach ($incomeTypeData['details'] as $detailData) {
                        if ($detailData['income_detail_name'] || $detailData['value']) {
                            $incomeType->details()->updateOrCreate(
                                ['id' => $detailData['id'] ?? null],
                                [
                                    'income_detail_name' => $detailData['income_detail_name'],
                                    'value' => $detailData['value'],
                                ]
                            );
                        }
                    }
                }
            }
            
            DB::commit();
            $this->success('Data berhasil diubah', redirectTo: route('dashboard.budget.operational.index'));
        } catch (\Exception $e) {
            DB::rollback();
            $this->error('Error', 'Terjadi error saat mengubah data'.$e->getMessage());
        }
    }

    public function mount($key) {
        $this->key = $key;
        $income = Income::find(decrypt($this->key));
        if ($income) {
            $this->year = $income->year;
            $this->originalYear = $income->year;
            $this->incomeTypes = $income->incomeTypes()->with('details')->get()->map(function ($incomeType) {
                return [
                    'id' => $incomeType->id,
                    'income_type_name' => $incomeType->income_type_name,
                    'value' => $incomeType->value,
                    'details' => $incomeType->details()->get()->map(function ($detail) {
                        return [
                            'id' => $detail->id,
                            'income_detail_name' => $detail->income_detail_name,
                            'value' => $detail->value,
                        ];
                    })->toArray(),
                ];
            })->map(function($incomeType) {
                $incomeType['details'][] = [
                    'income_detail_name' => null,
                    'value' => null
                ];
                return $incomeType;
            })->toArray();
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.budget.operational.edit');
    }
}
