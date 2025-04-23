<?php

namespace App\Livewire\Pages\Dashboard\Information\Report;

use App\Models\News;
use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;
use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    use WithFileUploads, WithMediaSync, Toast;

    public $createModalState = false;

    #[Validate('required|min:3')]
    public $title;
    #[Validate('required|min:3|unique:news,slug|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/')]
    public $slug;
    #[Validate('required')]
    public $description;

    // Temporary files
    #[Validate(['imageFiles.*' => 'image|max:2048'])]
    public array $imageFiles = [];

    // Temporary files
    #[Validate(['reportFiles.*' => 'mimes:pdf|max:2048'])]
    public array $reportFiles = [];

    // Library metadata (optional validation)
    #[Validate('required')]
    public Collection $library;


    public $config = [
        'license_key' => 'gpl',
        'plugins' => 'autoresize',
    ];

    public function updatedTitle() {
        $this->slug = Str::slug($this->title);
    }

    public function showNewsModal() {
        $this->validate();
        $this->createModalState = true;
    }

    public function createDraft() {
        $this->validate();
        $this->create('draft');
    }

    public function create($status = 'publish') {
        $mediaPaths = null;
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
                $news = News::create([
                    'title' => $this->title,
                    'slug' => $this->slug,
                    'type' => 'report',
                    'status' => $status,
                    'content' => $this->description,
                ]);

            $news->media()->createMany(
                $mediaPaths
            );

            DB::commit();
            $this->success('Report berhasil dibuat');
            $this->redirectRoute('dashboard.information.report.index', navigate: true);
        } catch (\Exception $e) {
            DB::rollback();
            $this->error("Error membuat artikel report: ".$e->getMessage());
        }
    }

    public function mount() {
        $this->library = collect();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.information.report.create');
    }
}
