<?php

namespace App\Livewire\Pages\Dashboard\VillageProgram;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\VillageProgram;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    use Toast;

    #[Validate('required|date_format:Y|unique:village_programs,year')]
    public $year;

    public $createDetailModal = false;
    public $accordionState;

    #[Locked]
    public $villageProgramDetails = [
        // [
        //     'title' => 'Pembangunan Jalan Desa',
        //     'description' => 'Pembangunan jalan utama desa sepanjang 2 km.',
        //     'status' => 'planning',
        //     'budget' => 150000000,
        //     'start_date' => '2024-07-01',
        //     'end_date' => '2024-09-30',
        // ],
        // [
        //     'title' => 'Pengadaan Air Bersih',
        //     'description' => 'Pemasangan instalasi air bersih untuk 100 rumah.',
        //     'status' => 'in_progress',
        //     'budget' => 80000000,
        //     'start_date' => '2024-05-15',
        //     'end_date' => '2024-08-15',
        // ],
        // [
        //     'title' => 'Pelatihan UMKM',
        //     'description' => 'Pelatihan kewirausahaan untuk warga desa.',
        //     'status' => 'completed',
        //     'budget' => 25000000,
        //     'start_date' => '2024-03-01',
        //     'end_date' => '2024-03-10',
        // ],
    ];

    #[On('addDetailProgram')]
    public function addDetailProgram($data) {
        $this->villageProgramDetails[] = $data;
        $this->createDetailModal = false;
    }

    public function removeDetailProgram($index) {
        unset($this->villageProgramDetails[$index]);
    }

    public function resetPage() {
        $this->reset();
    }

    public function create() {
        $this->validate();

        try {
            DB::beginTransaction();

            // Create the main VillageProgram record
            $villageProgram = VillageProgram::create([
                'year' => $this->year,
            ]);

            // Create related details
            $villageProgram->details()->createMany($this->villageProgramDetails);

            DB::commit();
            $this->success('Program desa berhasil dibuat.');
            $this->redirectRoute('dashboard.village-program.index', navigate: true);
            $this->resetPage();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.village-program.create');
    }
}
