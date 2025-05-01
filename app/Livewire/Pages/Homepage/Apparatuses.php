<?php

namespace App\Livewire\Pages\Homepage;

use App\Models\Apparatus;
use Livewire\Component;

class Apparatuses extends Component
{
    public function render()
    {
        return view('livewire.pages.homepage.apparatuses', [
            'apparatuses' => Apparatus::latest('id')->get(),
        ]);
    }
}
