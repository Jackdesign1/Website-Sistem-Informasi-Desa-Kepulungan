<?php

namespace App\Livewire\Pages\Dashboard\Homepage\HeroImage;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;
use App\Models\HomepageHeroImage;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    use Toast, WithMediaSync, WithFileUploads;
    #[Validate('required|image|max:2048')]
    public $background;
    #[Validate('required|max:255')]
    public $title;
    #[Validate('max:255')]
    public $subtitle;
    #[Validate('required')]
    public $order;
    public $buttonText;
    public $buttonUrl;

    public function rules() {
        $rules = [];
        if ($this->buttonText || $this->buttonUrl) {
            $rules['buttonText'] = 'required';
            $rules['buttonUrl'] = 'required|url';
        }
        return $rules;
    }

    public function create() {
        $this->validate();

        try {
            $backgroundPath = $this->background->store('hero_images', 'public');
        } catch (\Exception $e) {
            $this->error(__('Failed to upload background image.'));
        }

        try {
            DB::beginTransaction();

            if(HomepageHeroImage::where('order', $this->order)->exists()) {
                HomepageHeroImage::where('order', '>=', $this->order)->increment('order');
            }

            $heroImage = new HomepageHeroImage();
            $heroImage->image = 'storage/' . $backgroundPath;
            $heroImage->title = $this->title;
            $heroImage->subtitle = $this->subtitle;
            $heroImage->order = $this->order;
            $heroImage->button_text = $this->buttonText;
            $heroImage->button_url = $this->buttonUrl;

            $heroImage->save();
            DB::commit();
            $this->success(__('Hero image berhasil ditambahkan.'));
            $this->reset();
            $this->dispatch('setHeroImageCreateModal', false);
        } catch (\Exception $e) {
            $this->error(__('Gagal membuat hero image.'));
        }
    }

    public function mount() {
        $maxOrder = HomepageHeroImage::max('order');
        $this->order = is_null($maxOrder) ? 1 : $maxOrder + 1;
    }

    public function render()
    {
        return view('livewire.pages.dashboard.homepage.hero-image.create');
    }
}
