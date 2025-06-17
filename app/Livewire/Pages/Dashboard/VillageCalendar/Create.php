<?php

namespace App\Livewire\Pages\Dashboard\VillageCalendar;

use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public $selectedDate;

    public function create() 
    {
        dd('true');
    }

    #[On('initCreateVillageCalendar')]
    public function initCreateVillageCalendar()
    {
        $this->dispatch('initCreateModal', $this->selectedDate);
    }

    public function render()
    {
        return view('livewire.pages.dashboard.village-calendar.create');
    }
}
