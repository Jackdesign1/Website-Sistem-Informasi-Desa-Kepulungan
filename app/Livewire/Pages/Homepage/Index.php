<?php

namespace App\Livewire\Pages\Homepage;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.homepage.index');
    }
}
