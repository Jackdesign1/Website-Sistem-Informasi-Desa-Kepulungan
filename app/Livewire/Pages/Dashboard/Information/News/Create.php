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

class Create extends Component
{
    use WithFileUploads, WithMediaSync, Toast;

    public $createNewsModalState = false;

    #[Validate('required|min:3')]
    public $title;
    #[Validate('required|min:3|unique:news,slug|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/')]
    public $slug;
    #[Validate('required')]
    public $content;

    // Temporary files
    #[Rule(['files.*' => 'image|max:2048'])]
    public array $files = [];

    // Library metadata (optional validation)
    #[Rule('required')]
    public Collection $library;


    public $config = [
        'license_key' => 'gpl',
        'plugins' => 'autoresize',
    ];

    public function updatedTitle() {
        $this->slug = Str::slug($this->title);
    }

    public function createDraft() {
        $this->create('draft');
    }

    public function create($status = 'publish') {
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

    public function showNewsModal() {
        $this->validate();
        $this->createNewsModalState = true;
    }

    public function mount() {
        $this->library = new Collection();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.information.news.create');
    }
}
