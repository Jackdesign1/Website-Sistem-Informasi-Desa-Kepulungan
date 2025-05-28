<?php

namespace App\Livewire\Pages\VillageProfile;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest'), Title('Profil')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.village-profile.index');
    }
}
