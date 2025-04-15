<?php

namespace App\Livewire\Pages\Homepage;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Index extends Component
{
    public $selectedTab;

    public function render()
    {
        return view('livewire.pages.homepage.index');
    }
}
