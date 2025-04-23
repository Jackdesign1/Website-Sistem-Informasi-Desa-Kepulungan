<?php

namespace App\Livewire\Pages\Dashboard\Information\News;

use App\Models\News;
use Livewire\Component;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast;

    public $changeStatusModal = false;
    public $selectedNews;

    public function changeStatus() {
        try {
            $news = News::find(decrypt($this->selectedNews));
            $newStatus = $news->status == "draft"? "publish" : "draft";
            $news->status = $newStatus; 
            $news->save();
            $this->success($newStatus == 'publish'? 'Berita berhasil dipublish' : 'Berita berhasil ditarik dari publikasi');
            $this->changeStatusModal = false;
        } catch (\Exception $e) {
            $this->error("Error mengubah status", "Terjadi kesalahan saat mengubah status berita.");
        }
    }

    public function render()
    {
        return view("livewire.pages.dashboard.information.news.index", [
            "news" => News::onlyNews()->latest()->get(),
        ]);
    }
}
