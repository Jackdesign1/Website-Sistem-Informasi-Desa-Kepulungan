<?php

namespace App\Livewire\Pages\Contact;

use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Index extends Component
{
    public $selectedContactTab;

    public function mount(Request $request) {
        $this->selectedContactTab = $request->set?? 'report';
    }

    public function render()
    {
        return view('livewire.pages.contact.index');
    }
}
