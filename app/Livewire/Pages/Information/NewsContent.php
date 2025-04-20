<?php

namespace App\Livewire\Pages\Information;

use App\Models\News;
use Livewire\Component;

class NewsContent extends Component
{
    public $news;

    public function mount($type, $slug) {
        dump($type, $slug);
    }

    public function render()
    {
        return view('livewire.pages.information.news-content');
    }
}
