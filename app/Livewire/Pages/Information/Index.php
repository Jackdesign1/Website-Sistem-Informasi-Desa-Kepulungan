<?php

namespace App\Livewire\Pages\Information;

use App\Models\News;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.guest'), Title('Informasi')]
class Index extends Component
{
    public $selectedTab;

    public function mount(Request $request) {
        $this->selectedTab = $request->set?? 'news';
    }

    public function render()
    {
        return view('livewire.pages.information.index');
    }
}
