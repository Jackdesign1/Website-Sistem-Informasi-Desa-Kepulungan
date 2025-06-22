<?php

namespace App\Livewire\Pages\Dashboard\VillageProgram;

use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\Attributes\On;
use App\Models\VillageProgram;
use Livewire\Attributes\Locked;
use App\Models\VillageProgramDetail;

class Edit extends Component
{
    use Toast;

    public $createEditDetailModal = false;
    public $accordionState;

    public $key;
    #[Locked]
    public $year;
    public $villageProgramDetails = [];

    public function editDetailProgram($index) {
        $this->dispatch('initEditDetail', $this->villageProgramDetails[$index], $index);
    }

    #[On('addDetailProgram')]
    public function addDetailProgram($data) {
        $this->villageProgramDetails[] = $data;
        $this->createEditDetailModal = false;
    }

    #[On('addEditDetailProgram')]
    public function addEditDetailProgram($data, $index = null) {
        $this->villageProgramDetails[$index] = $data;
        $this->createEditDetailModal = false;
    }

    public function removeDetailProgram($index) {
        if (isset($this->villageProgramDetails[$index]['id'])) {
            try {
                VillageProgramDetail::find(decrypt($this->villageProgramDetails[$index]['id']))->delete();
                $this->success('Detail berhasil dihapus dari database');
            } catch (\Exception $e) {
                $this->error('Terjadi kesalahan saat menghapus data');
            }
        }
        unset($this->villageProgramDetails[$index]);
    }

    public function edit()
    {
        try {
            $villageProgram = VillageProgram::find(decrypt($this->key));
            collect($this->villageProgramDetails)->each(function($detail) use ($villageProgram) {
                $villageProgram->details()->updateOrCreate(
                    ['id' => isset($detail['key'])? decrypt($detail['key']) : null],
                    Arr::except($detail, ['key'])
                );
            });

            $this->success('Program Desa berhasil diedit', redirectTo: route('dashboard.village-program.index'));
        } catch (\Exception $e) {
            $this->error('Error', 'Terjadi kesalahan saat memproses request.');
        }
    }

    public function mount($key) {
        $this->key = $key;

        $villageProgram = VillageProgram::find(decrypt($key));
        $this->year = $villageProgram->year;

        $this->villageProgramDetails = $villageProgram->details->map(function($detail) {
            return [
                'key' => encrypt($detail->id),
                'title' => $detail->title,
                'description' => $detail->description,
                'status' => $detail->status,
                'budget' => $detail->budget,
                'start_date' => $detail->start_date,
                'end_date' => $detail->end_date,
            ];
        });
    }

    public function render()
    {
        return view('livewire.pages.dashboard.village-program.edit');
    }
}
