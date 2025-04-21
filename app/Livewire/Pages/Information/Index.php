<?php

namespace App\Livewire\Pages\Information;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Index extends Component
{
    public $selectedTab = "news";

    public function render()
    {
        return view('livewire.pages.information.index');
    }
}
