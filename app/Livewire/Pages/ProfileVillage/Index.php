<?php

namespace App\Livewire\Pages\ProfileVillage;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.profile-village.index');
    }
}
