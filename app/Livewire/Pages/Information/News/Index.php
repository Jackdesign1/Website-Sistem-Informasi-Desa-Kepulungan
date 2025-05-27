<?php

namespace App\Livewire\Pages\Information\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function placeholder() {
        return view('livewire.pages.information.content-placeholder');
    }

    public function render()
    {
        $news = News::onlyNews()->onlyPublish()->with('imageMedia')->latest()->paginate(10, pageName: 'news');
        $newsChunks = [[], []];
        foreach ($news as $i => $item) {
            $newsChunks[$i % 2][] = $item;
        }

        return view('livewire.pages.information.news.index', [
            'newsChunks' => $newsChunks,
            'news' => $news, // keep original paginator for pagination links
        ]);
    }
}
