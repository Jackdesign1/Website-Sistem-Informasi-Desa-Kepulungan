<?php

namespace App\Livewire\Pages\Information;

use App\Models\News;
use Livewire\Component;

class HeroSection extends Component
{
    public function render()
    {
        $news = News::onlyNews()->latest()->take(2)->get()->load('media');
        $reports = News::onlyReport()->latest()->take(2)->get()->load('media');

        return view('livewire.pages.information.hero-section', [
            'news' => $news,
            'reports' => $reports,
        ]);
        // return view('livewire.pages.information.placeholder.hero-section');
    }

    public function placeholder() {
        return view('livewire.pages.information.placeholder.hero-section');
    }
}
