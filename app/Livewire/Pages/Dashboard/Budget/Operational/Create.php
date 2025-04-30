<?php

namespace App\Livewire\Pages\Dashboard\Budget\Operational;

use App\Models\Income;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    #[Validate('required|date_format:Y|unique:incomes,year')]
    public $year;

    // #[Validate([
    //     'incomeTypes.*.income_type_name' => 'string',
    //     'incomeTypes.*.value' => 'integer',
    //     'incomeTypes.*.details.*.income_detail_name' => 'string',
    //     'incomeTypes.*.details.*.value' => 'integer',
    // ])]
    public $incomeTypes = [
        [
            'income_type_name' => 'Bidang Pemerintahan',
            'value' => null,
            'details' => [
                [
                    'income_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'income_type_name' => 'Bidang Pembangunan',
            'value' => null,
            'details' => [
                [
                    'income_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'income_type_name' => 'Bidang Pembinaan Masyarakat',
            'value' => null,
            'details' => [
                [
                    'income_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'income_type_name' => 'Bidang Pemberdayaan Masyarakat',
            'value' => null,
            'details' => [
                [
                    'income_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'income_type_name' => 'Penyertaan Modal BUMDes',
            'value' => null,
            'details' => [
                [
                    'income_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
        [
            'income_type_name' => 'Bidang Penanggulangan Bencana',
            'value' => null,
            'details' => [
                [
                    'income_detail_name' => null,
                    'value' => null
                ],
            ]
        ],
    ];

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
        unset($this->incomeTypes[$index]);
    }

    public function removeIncomeDetail($typeIndex, $detailIndex) {
        unset($this->incomeTypes[$typeIndex]['details'][$detailIndex]);
    }

    public function resetPage() {
        $this->reset();
    }

    public function create() {
        $this->validate();
        try {
            DB::beginTransaction();

            $income = Income::create([
                'year' => $this->year,
            ]);

            $incomeTypesData = collect($this->incomeTypes)->map(function ($incomeType) use ($income) {
                $data = [
                    'income_id' => $income->id,
                    'income_type_name' => $incomeType['income_type_name'],
                ];

                $details = collect($incomeType['details'])->reject(function($detail) {
                    return in_array(null, $detail, true);
                });

                if (isset($details[0])) {
                    $data['details'] = $details;
                }
                return $data;
            })->toArray();

            $incomeTypes = $income->incomeTypes()->createMany($incomeTypesData)->each(function ($incomeType, $key) use ($incomeTypesData) {
                if (isset($incomeTypesData[$key]['details'])) {
                    $incomeType->details()->createMany($incomeTypesData[$key]['details']);
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
