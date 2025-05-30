<?php

namespace App\Livewire\Pages\Dashboard\Information\News;

use App\Models\News;
use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    use WithFileUploads, WithMediaSync, Toast;

    public $editNewsModal = false;

    public $id;
    public $originalSlug;
    public $status;

    #[Validate('required|min:3')]
    public $title;
    public $slug;
    #[Validate('required')]
    public $content;

    // Temporary files
    #[Rule(['files.*' => 'image|max:2048'])]
    public $files = [];

    public Collection $library;

    public $config = [
        'license_key' => 'gpl',
        'plugins' => 'autoresize',
    ];

    public function uploadedMedia() {
        return News::findOrFail($this->id)->media;
    }


    public function rules() {
        $slug_rules = 'required|min:3|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/';
        if ($this->slug !== $this->originalSlug) {
            $slug_rules = '|unique:news,slug';
        };
        return [
            'slug' => $slug_rules
        ];
    }

    public function updatedTitle() {
        $this->slug = Str::slug($this->title);
    }

    public function validateForm() {
        $this->validate();
        $this->editNewsModal = true;
    }

    public function editDraft() {
        $this->edit('draft');
    }

    public function edit($status = 'publish') {
        $imagePaths = null;

        try {
            $imagePaths = collect($this->files)->map(function($file) {
                return [
                    'url' => '/storage/'.$file->store('news', 'public'),
                    'type' => 'image',
                ];
            })->toArray();
        } catch (\Exception $e) {
            $this->error('Error upload gambar');
        }

        try {
            DB::beginTransaction();
            $news = News::find($this->id);

            // $news->update([
            //     'title' => $this->title,
            //     'slug' => $this->slug,
            //     'status' => $status,
            //     'content' => $this->content,
            // ]);
            $news->title = $this->title;
            $news->slug = $this->slug;
            $news->status = $status;
            $news->content = $this->content;

            $newMedia = $news->media()->createMany(
                $imagePaths
            );


            $toastMessage = 'Tidak ada perubahan data';
            if ($news->isDirty() || $newMedia->count() > 0) {
                $toastMessage = 'Berita berhasil diedit';
            }

            $news->save();
            DB::commit();
            $this->success($toastMessage);
            $this->redirectRoute('dashboard.information.news.index', navigate: true);
        } catch (\Exception $e) {
            DB::rollback();
            $this->error("Error mengedit artikel berita: ".$e->getMessage());
        }
    }

    public function removeUploadedMedia($mediaId) {
        try {
            News::find($this->id)->media()->find($mediaId)->delete();
            $this->success("Berhasil menghapus gambar");
        } catch (\Exception $e) {
            $this->error("Error menghapus data");
        }
    }

    public function mount($key) {
        $news = News::find(decrypt($key));

        $this->library = collect();
        $this->fill($news);
        $this->originalSlug = $news->slug;
    }

    public function render()
    {
        return view('livewire.pages.dashboard.information.news.edit', [
            'uploaded_media' => $this->uploadedMedia()
        ]);
    }
}
