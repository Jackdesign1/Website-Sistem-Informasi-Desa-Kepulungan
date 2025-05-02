<?php

namespace App\Livewire\Pages\Information;

use App\Models\News;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Index extends Component
{
    public $selectedTab;

    public function mount(Request $request) {
        $this->selectedTab = $request->set?? 'news';
    }

    public function render()
    {
        $news = News::onlyNews()->latest()->take(4)->get();
        $reports = News::onlyReport()->latest()->take(4)->get();

        if (!$reports->isEmpty() && !$news->isEmpty()) {
            $news = $news->take(2);
            $reports = $reports->take(2);
        }

        return view('livewire.pages.information.index', [
            'news' => $news,
            'reports' => $reports,
        ]);
    }
}
