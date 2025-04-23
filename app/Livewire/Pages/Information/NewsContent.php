<?php

namespace App\Livewire\Pages\Information;

use App\Models\News;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.guest')]
class NewsContent extends Component
{
    public $slug;
    public $type;

    #[Computed()]
    public function news() {
        $news = News::firstWhere('slug', $this->slug);
        if ($this->type == 'news') {
            $news->load('imageMedia');
        } else {
            $news->load('imageMedia', 'fileMedia');
        }
        return $news;
    }

    public function mount($type, $slug) {
        $this->type = $type;
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.pages.information.news-content', [
            'data' => $this->news,
            'images' => $this->news->imageMedia->pluck('url')->map(function($url) {
                return ['image' => $url];
            })->toArray()
        ]);
    }
}
