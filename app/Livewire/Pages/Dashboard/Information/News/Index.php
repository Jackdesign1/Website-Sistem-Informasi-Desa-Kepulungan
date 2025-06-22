<?php

namespace App\Livewire\Pages\Dashboard\Information\News;

use App\Models\News;
use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use Toast;

    public $statusModalState = false;
    public $deleteModalState = false;

    public $selectedKey;

    public function changeStatus()
    {
        try {
            $news = News::find(decrypt($this->selectedKey));
            $newStatus = $news->status == "draft"? "publish" : "draft";
            $news->status = $newStatus;
            $news->save();
            $this->success($newStatus == 'publish'? 'Berita berhasil dipublish' : 'Berita berhasil ditarik dari publikasi');
            $this->statusModalState = false;
        } catch (\Exception $e) {
            $this->error("Error mengubah status", "Terjadi kesalahan saat mengubah status berita.");
        }
    }

    public function showDeleteModal() {
        $this->statusModalState = true;
    }

    public function delete()
    {
        $this->authorize('delete', Auth::user());
        News::find(decrypt($this->selectedKey))->delete();
        $this->success('Berita berhasil dihapus');
        $this->deleteModalState = false;
    }


    public function render()
    {
        return view("livewire.pages.dashboard.information.news.index", [
            "news" => News::onlyNews()->with('media')->latest()->get(),
        ]);
    }
}
