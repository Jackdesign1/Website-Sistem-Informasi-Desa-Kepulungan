<?php

namespace App\Livewire\Pages\Information;

use App\Models\News;
use Livewire\Component;

class Rightbar extends Component
{
    public function render()
    {
        return view('livewire.pages.information.rightbar', [
            'news' => News::onlyNews()->limit(2)->latest()->get()->load('imageMedia'),
            'reports' => News::onlyReport()->limit(2)->latest()->get()->load('imageMedia', 'fileMedia'),
            'jobs' => []
        ]);
    }
}
