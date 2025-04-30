<?php

namespace App\Livewire\Pages\Dashboard\Budget\Operational;

use App\Models\Operational;
use App\Models\OperationalBudget;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    #[Validate('required|date_format:Y|unique:operational_budgets,year')]
    public $year;

    // #[Validate([
    //     'operationalTypes.*.operational_type_name' => 'string',
    //     'operationalTypes.*.value' => 'integer',
    //     'operationalTypes.*.details.*.operational_detail_name' => 'string',
    //     'operationalTypes.*.details.*.value' => 'integer',
    // ])]
    public $operationalTypes = [
        [
            'operational_type_name' => 'Bidang Pemerintahan',
            'value' => null,
            'details' => [
                [
                    'operational_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'operational_type_name' => 'Bidang Pembangunan',
            'value' => null,
            'details' => [
                [
                    'operational_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'operational_type_name' => 'Bidang Pembinaan Masyarakat',
            'value' => null,
            'details' => [
                [
                    'operational_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'operational_type_name' => 'Bidang Pemberdayaan Masyarakat',
            'value' => null,
            'details' => [
                [
                    'operational_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'operational_type_name' => 'Penyertaan Modal BUMDes',
            'value' => null,
            'details' => [
                [
                    'operational_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'operational_type_name' => 'Bidang Penanggulangan Bencana',
            'value' => null,
            'details' => [
                [
                    'operational_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
    ];

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
        unset($this->operationalTypes[$index]);
    }

    public function removeOperationalDetail($typeIndex, $detailIndex) {
        unset($this->operationalTypes[$typeIndex]['details'][$detailIndex]);
    }

    public function resetPage() {
        $this->reset();
    }

    public function create() {
        $this->validate();
        try {
            DB::beginTransaction();

            $operational = OperationalBudget::create([
                'year' => $this->year,
            ]);

            $operationalTypesData = collect($this->operationalTypes)->map(function ($operationalType) use ($operational) {
                $data = [
                    'operational_budget_id' => $operational->id,
                    'operational_type_name' => $operationalType['operational_type_name'],
                ];

                $details = collect($operationalType['details'])->reject(function($detail) {
                    return in_array(null, $detail, true);
                });

                if (isset($details[0])) {
                    $data['details'] = $details;
                }
                return $data;
            })->toArray();

            $operationalTypes = $operational->operationalTypes()->createMany($operationalTypesData)->each(function ($operationalType, $key) use ($operationalTypesData) {
                if (isset($operationalTypesData[$key]['details'])) {
                    $operationalType->details()->createMany($operationalTypesData[$key]['details']);
                }
            });

            DB::commit();
            $this->success('Berhasil menambahkan data', redirectTo: route('dashboard.budget.operational.index'));
        } catch (\Exception $e) {
            DB::rollback();
            $this->error('Error', 'Terjadi error saat menambahkan data'.$e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.pages.dashboard.budget.operational.create');
    }
}
