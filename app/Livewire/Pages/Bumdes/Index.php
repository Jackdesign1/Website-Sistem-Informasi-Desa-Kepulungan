<?php

namespace App\Livewire\Pages\Bumdes;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest'), Title('BUMDes')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.bumdes.index');
    }
}
