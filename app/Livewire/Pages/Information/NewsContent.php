<?php

namespace App\Livewire\Pages\Information;

use App\Models\News;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;

#[Layout('layouts.guest'), Title('Informasi')]
class NewsContent extends Component
{
    public $slug;
    public $type;
    public $content;

    #[Computed()]
    public function news() {
        $news = News::firstWhere('slug', $this->slug);
        if ($this->type == 'news') {
            $news->load('imageMedia');
        } else {
            $news->load('imageMedia', 'fileMedia');
        }
        $this->content = $news->content;
        return $news;
    }

    public function mount($type, $slug) {
        $this->type = $type;
        $this->slug = $slug;
    }

    public function render()
    {
        if($this->news->status != 'publish') {
            abort(404);
        }

        return view('livewire.pages.information.news-content', [
            'data' => $this->news,
            'images' => $this->news->imageMedia->pluck('url')->map(function($url) {
                return ['image' => $url];
            })->toArray()
        ])->layout('layouts.guest', [
            'metaTitle' => $this->news->title,
            'metaDescription' => $this->news->description,
            'metaImage' => env('APP_URL').$this->news->imageMedia->first()?->url,
            'metaUrl' => request()->url(),
        ]);
    }
}
