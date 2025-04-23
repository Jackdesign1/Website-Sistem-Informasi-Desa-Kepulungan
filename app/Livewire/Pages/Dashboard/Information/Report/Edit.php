<?php

namespace App\Livewire\Pages\Dashboard\Information\Report;

use App\Models\News;
use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Support\Str;
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
    // public $uploadedImageMedia;
    // public $uploadedFileMedia;

    #[Computed]
    public function news() {
        $news = News::findOrFail($this->id)->load('imageMedia', 'fileMedia');
        return $news->setRelation('uploadedImageMedia', $news->imageMedia)->setRelation('uploadedFileMedia', $news->fileMedia);
    }

    #[Validate('required|min:3')]
    public $title;
    public $slug;
    #[Validate('required')]
    public $content;

    // Temporary imageFiles
    #[Validate(['imageFiles.*' => 'image|max:2048'])]
    public $imageFiles = [];

    // Temporary reportFiles
    #[Validate(['reportFiles.*' => 'mimes:pdf|max:2048'])]
    public $reportFiles = [];

    public Collection $library;

    public $config = [
        'license_key' => 'gpl',
        'plugins' => 'autoresize',
    ];

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
        $this->validate();
        $this->edit('draft');
    }

    public function edit($status = 'publish') {
        $imagePaths = null;

        try {
            $imagePaths = collect($this->imageFiles)->map(function($file) {
                return [
                    'url' => '/storage/'.$file->store('news', 'public'),
                    'type' => 'image',
                ];
            });
            $reportPaths = collect($this->reportFiles)->map(function($file) {
                return [
                    'url' => '/storage/'.$file->store('news', 'public'),
                    'type' => 'file',
                    'name' => $file->getClientOriginalName(),
                    'alt' => $file->getClientOriginalName(),
                ];
            });
            $mediaPaths = $imagePaths->merge($reportPaths);

        } catch (\Exception $e) {
            $this->error('Error upload file');
        }

        try {
            DB::beginTransaction();
            $news = News::find($this->id);

            $news->title = $this->title;
            $news->slug = $this->slug;
            $news->status = $status;
            $news->content = $this->content;

            $newMedia = $news->media()->createMany(
                $mediaPaths
            );

            $toastMessage = 'Tidak ada perubahan data';
            if ($news->isDirty() || $newMedia->count() > 0) {
                $toastMessage = 'Laporan berhasil diubah';
            }

            $news->save();
            DB::commit();
            $this->success($toastMessage);
            $this->redirectRoute('dashboard.information.report.index', navigate: true);
        } catch (\Exception $e) {
            DB::rollback();
            $this->error("Error mengedit artikel laporan: ".$e->getMessage());
        }
    }

    public function removeUploadedMedia($mediaId) {
        try {
            News::find($this->id)->media()->find($mediaId)->delete();
            $this->success("Berhasil menghapus media");
        } catch (\Exception $e) {
            $this->error("Error menghapus data");
        }
    }

    public function mount($key) {
        $this->id = decrypt($key);
        $this->fill($this->news);
        $this->originalSlug = $this->news->slug;

        $this->library = collect();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.information.report.edit', [
            'news' => $this->news
        ]);
    }
}
