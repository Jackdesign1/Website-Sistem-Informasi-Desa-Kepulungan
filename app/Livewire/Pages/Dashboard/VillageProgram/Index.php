<?php

namespace App\Livewire\Pages\Dashboard\VillageProgram;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\VillageProgram;

class Index extends Component
{
    use Toast;
    public $createModal = true;

    public function getVillagePrograms() {
        return VillageProgram::latest('year')->get()->load('details');
    }

    public function delete($key) {
        try {
            $villageProgram = VillageProgram::find(decrypt($key));
            $villageProgram->delete();
            $this->success("Program desa tahun $villageProgram->year berhasil dihapus");
        } catch (\Exception $e) {
            $this->error('Gagal menghapus data anggaran');
        }
    }

    public function render()
    {
        $villagePrograms = $this->getVillagePrograms();
        // Chunk the collection into 2 parts (not 2 items per chunk)
        $chunkedVillagePrograms = collect([
            $villagePrograms->filter(function ($item, $key) {
                return $key % 2 === 0; // odd index (0-based)
            })->values(),
            $villagePrograms->filter(function ($item, $key) {
                return $key % 2 === 1; // even index (0-based)
            })->values(),
        ]);
        return view('livewire.pages.dashboard.village-program.index', [
            'villagePrograms' => $villagePrograms,
            'chunkedVillagePrograms' => $chunkedVillagePrograms
        ]);
    }
}
