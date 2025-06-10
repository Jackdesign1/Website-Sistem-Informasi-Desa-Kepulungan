<?php

namespace App\Livewire\Pages\Information;

use Livewire\Component;

class HeroSection extends Component
{
    public $news;
    public $reports;

    public function mount($news, $reports) {
        $this->news = [
            $news,
            $reports,
        ];
        // $this->reports = $reports;
    }

    public function render()
    {
        return view('livewire.pages.information.hero-section');
    }
}
