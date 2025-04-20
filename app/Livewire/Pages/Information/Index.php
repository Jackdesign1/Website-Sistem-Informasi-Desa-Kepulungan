<?php

namespace App\Livewire\Pages\Information;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Index extends Component
{
    public $selectedTab = "jobs";

    public function render()
    {
        return view('livewire.pages.information.index');
    }
}
