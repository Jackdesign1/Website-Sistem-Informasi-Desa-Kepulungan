<?php

namespace App\Livewire\Pages\Dashboard\Information\News;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;
use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;

class Create extends Component
{
    use WithFileUploads, WithMediaSync;

    #[Validate('required|min:3')]
    public $title;
    #[Validate('required|min:3|slug|unique:news.slug')]
    public $slug;
    #[Validate('required')]
    public $content;

    // Temporary files
    #[Rule(['files.*' => 'image|max:1024'])]
    public array $files = [];
    
    // Library metadata (optional validation)
    #[Rule('required')]
    public Collection $library;
    
    
    public $config = [
        'license_key' => 'gpl',
        'min_height' => '600',
        'plugins' => 'autoresize',
    ];

    public function updatedTitle() {
        $this->slug = Str::slug($this->title);
    }

    public function create() {
        dump($this->files, $this->library);
    }

    public function mount() {
        $this->library = new Collection();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.information.news.create');
    }
}
