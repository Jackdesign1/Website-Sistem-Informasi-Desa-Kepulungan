<?php

namespace App\Livewire\Pages\Dashboard\VillageCalendar;

use Livewire\Component;

class Index extends Component
{
    public $createModalState = false;

    public function render()
    {
        return view('livewire.pages.dashboard.village-calendar.index');
    }
}
