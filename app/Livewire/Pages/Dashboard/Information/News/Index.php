<?php

namespace App\Livewire\Pages\Dashboard\Information\News;

use App\Models\News;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.information.news.index', [
            'news' => News::onlyNews()->latest()->get(),
        ]);
    }
}
