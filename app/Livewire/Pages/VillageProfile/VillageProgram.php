<?php

namespace App\Livewire\Pages\VillageProfile;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\VillageProgram as ModelsVillageProgram;

class VillageProgram extends Component
{
    public $years;
    public $selectedYear;

    public function mount() {
        $villagePrograms = ModelsVillageProgram::select("year")->distinct()->pluck("year");

        $years = $villagePrograms->unique()->sortDesc()->values();
        $years = $years->map(function ($year) {
            return [
                "year" => $year,
                "label" => $year,
            ];
        });
        $this->years = $years->toArray();
        $currentYear = now()->year;
        $this->selectedYear = $years->firstWhere("year", $currentYear)["year"] ?? $years->first()["year"] ?? null;
    }

    // #[Computed()]
    public function getVillageProgram() {
        return ModelsVillageProgram::with('details')->firstWhere('year', $this->selectedYear);
    }

    public function render()
    {
        return view('livewire.pages.village-profile.village-program', [
            'villageProgram' => $this->getVillageProgram()
        ]);
    }
}
