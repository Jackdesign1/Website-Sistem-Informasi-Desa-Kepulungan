<?php

namespace App\Livewire\Pages\Dashboard\Budget\Operational;

use App\Models\Operational;
use App\Models\OperationalBudget;
use App\Models\OperationalBudgetTypeDetail;
use App\Models\OperationalDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;

    // this is the id for Operational
    public $key;

    public $originalYear;
    public $year;

    // #[Validate([
    //     'operationalTypes.*.operational_type_name' => 'string',
    //     'operationalTypes.*.value' => 'integer',
    //     'operationalTypes.*.details.*.operational_detail_name' => 'string',
    //     'operationalTypes.*.details.*.value' => 'integer',
    // ])]
    public $operationalTypes = [
        [
            'operational_type_name' => null,
            'value' => null,
            'details' => [
                [
                    'operational_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
    ];

    public function rules() {
        $yearRule = 'required|date_format:Y';
        if ($this->originalYear !== $this->year) {
            $yearRule .= '|unique:operational_budgets,year';
        }
        return [
            'year' => $yearRule,
        ];
    }

    public function addOperationalType() {
        $this->operationalTypes[] = [
            'operational_type_name' => null,
            'value' => null,
            'details' => [
                [
                    'operational_detail_name' => null,
                    'value' => null
                ],
            ]
        ];
    }

    public function addOperationalDetail($typeIndex) {
        $this->operationalTypes[$typeIndex]['details'][] = [
            'operational_detail_name' => null,
            'value' => null
        ];
    }

    public function removeOperationalType($index) {
        $operationalTypeId = $this->operationalTypes[$index]['id'] ?? null;
        if ($operationalTypeId) {
            OperationalBudget::find(decrypt($this->key))->operationalTypes()->where('id', $operationalTypeId)->delete();
        }
        unset($this->operationalTypes[$index]);
        $this->info('Berhasil menghapus data');
    }

    public function removeOperationalDetail($typeIndex, $detailIndex) {
        $operationalDetailId = $this->operationalTypes[$typeIndex]['details'][$detailIndex]['id'] ?? null;
        if ($operationalDetailId) {
            OperationalBudgetTypeDetail::find($operationalDetailId)->delete();
        }
        unset($this->operationalTypes[$typeIndex]['details'][$detailIndex]);
        $this->info('Berhasil menghapus data');
    }

    public function resetPage() {
        $this->reset();
    }

    public function edit() {
        $this->validate();
        try {
            DB::beginTransaction();

            $operational = OperationalBudget::find(decrypt($this->key));

            $operational->update([
                'year' => $this->year,
            ]);

            foreach ($this->operationalTypes as $operationalTypeData) {
                $operationalType = $operational->operationalTypes()->updateOrCreate(
                    ['id' => $operationalTypeData['id'] ?? null],
                    [
                        'operational_type_name' => $operationalTypeData['operational_type_name'],
                        'value' => $operationalTypeData['value'],
                    ]
                );

                if (isset($operationalTypeData['details'])) {
                    foreach ($operationalTypeData['details'] as $detailData) {
                        if ($detailData['operational_detail_name'] || $detailData['value']) {
                            $operationalType->details()->updateOrCreate(
                                ['id' => $detailData['id'] ?? null],
                                [
                                    'operational_detail_name' => $detailData['operational_detail_name'],
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
        $operational = OperationalBudget::find(decrypt($this->key));
        if ($operational) {
            $this->year = $operational->year;
            $this->originalYear = $operational->year;
            $this->operationalTypes = $operational->operationalTypes()->with('details')->get()->map(function ($operationalType) {
                return [
                    'id' => $operationalType->id,
                    'operational_type_name' => $operationalType->operational_type_name,
                    'value' => $operationalType->value,
                    'details' => $operationalType->details()->get()->map(function ($detail) {
                        return [
                            'id' => $detail->id,
                            'operational_detail_name' => $detail->operational_detail_name,
                            'value' => $detail->value,
                        ];
                    })->toArray(),
                ];
            })->map(function($operationalType) {
                $operationalType['details'][] = [
                    'operational_detail_name' => null,
                    'value' => null
                ];
                return $operationalType;
            })->toArray();
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.budget.operational.edit');
    }
}
