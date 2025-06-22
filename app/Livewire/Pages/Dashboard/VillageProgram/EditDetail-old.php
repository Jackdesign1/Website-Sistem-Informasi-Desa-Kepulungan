<?php

namespace App\Livewire\Pages\Dashboard\VillageProgram;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class EditDetail extends Component
{
    public $statusOptions = [
        ['key' => 'planned', 'label' => 'Perencanaan'],
        ['key' => 'in_progress', 'label' => 'Berjalan'],
        ['key' => 'completed', 'label' => 'Selesai']
    ];

    // wich index is the edited data in the array
    public $index;

    public $key;
    #[Validate('required|string|max:255')]
    public $title;
    #[Validate('nullable|string')]
    public $description;
    #[Validate('required|in:planned,in_progress,completed')]
    public $status = 'planned';
    #[Validate('nullable|min:0')]
    public $budget;
    #[Validate('nullable|date|required_with:villageProgramDetails.*.end_date')]
    public $start_date;
    #[Validate('nullable|date')]
    public $end_date;

    public function resetPage() {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.village-program.edit-detail');
    }
}
