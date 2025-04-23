<?php

namespace App\Livewire\Pages\Dashboard\Information\News;

use App\Models\News;
use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;
use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    use WithFileUploads, WithMediaSync, Toast;

    public $editNewsModal = false;

    public $original_slug;
    public $status;
    public $media;

    #[Validate('required|min:3')]
    public $title;
    #[Validate('required|min:3|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/')]
    public $slug;
    #[Validate('required')]
    public $content;

    // Temporary files
    #[Rule(['files.*' => 'image|max:2048'])]
    public $files = [];

    // Library metadata (optional validation)
    #[Rule('required')]
    public Collection $library;


    public $config = [
        'license_key' => 'gpl',
        'plugins' => 'autoresize',
    ];

    public function rules() {
        // $slug_rules = 'required|min:3|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/';
        if ($this->slug == $this->original_slug) {
            $slug_rules = 'unique:news,slug';
        };
        return [
            'slug' => $slug_rules
        ];
    }

    public function updatedTitle() {
        $this->slug = Str::slug($this->title);
    }

    public function editDraft() {
        $this->edit('draft');
    }

    public function edit($status = 'publish') {
        dd($status, $this->files, $this->library);

        $this->validate();

        $imagePaths = null;

        try {
            $imagePaths = collect($this->files)->map(function($file) {
                return [
                    'url' => $file->store('news', 'public'),
                    'type' => 'image',
                ];
            })->toArray();
        } catch (\Exception $e) {
            $this->error('Error upload gambar');
        }

        try {
            DB::beginTransaction();
                $news = News::create([
                    'title' => $this->title,
                    'slug' => $this->slug,
                    'type' => 'news',
                    'status' => $status,
                    'content' => $this->content,
                ]);

            $news->media()->createMany(
                $imagePaths
            );

            DB::commit();
            $this->success('Berita berhasil dibuat');
            $this->redirectRoute('dashboard.information.news.index', navigate: true);
        } catch (\Exception $e) {
            DB::rollback();
            $this->error("Error membuat artikel berita: ".$e->getMessage());
        }
    }

    public function mount($key) {
        $news = News::find(decrypt($key));

        $this->media = $news->media;
        
        $this->library = collect();

        $this->slug = $news->slug;
        $this->original_slug = $news->slug;
        $this->title = $news->title;
        $this->content = $news->content;
        $this->status = $news->status;
    }

    public function render()
    {
        return view('livewire.pages.dashboard.information.news.edit');
    }
}
