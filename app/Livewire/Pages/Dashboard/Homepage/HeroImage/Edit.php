<?php

namespace App\Livewire\Pages\Dashboard\Homepage\HeroImage;

use App\Models\HomepageHeroImage;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Mary\Traits\WithMediaSync;

class Edit extends Component
{
    use Toast, WithMediaSync, WithFileUploads;
    public $key;

    public $background;
    public $newBackground;

    #[Validate('required|max:255')]
    public $title;
    #[Validate('required|max:255')]
    public $subtitle;

    public $order;
    #[Validate('required')]
    public $newOrder;

    public $buttonText;
    public $buttonUrl;

    public function rules() {
        $rules = [];
        if ($this->newBackground) {
            $rules['newBackground'] = 'image|max:2048';
        }
        return $rules;
    }

    #[On('initEditHeroImage')]
    public function initEditHeroImage($key) {
        $this->key = $key;
        $heroImage = HomepageHeroImage::findOrFail(decrypt($key));
        $this->background = $heroImage->image;
        $this->title = $heroImage->title;
        $this->subtitle = $heroImage->subtitle;
        $this->order = $heroImage->order;
        $this->newOrder = $heroImage->order;
        $this->buttonText = $heroImage->button_text;
        $this->buttonUrl = $heroImage->button_url;
    }

    public function edit()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $heroImage = HomepageHeroImage::findOrFail(decrypt($this->key));

            // If order has changed, update other records
            if ($heroImage->order != $this->newOrder) {
                // Increment order for records with order >= newOrder and < current order
                if ($this->newOrder < $heroImage->order) {
                    HomepageHeroImage::where('order', '>=', $this->newOrder)
                        ->where('order', '<', $heroImage->order)
                        ->increment('order');
                }
                // Decrement order for records with order <= newOrder and > current order
                elseif ($this->newOrder > $heroImage->order) {
                    HomepageHeroImage::where('order', '<=', $this->newOrder)
                        ->where('order', '>', $heroImage->order)
                        ->decrement('order');
                }
                $heroImage->order = $this->newOrder;
            }

            $heroImage->title = $this->title;
            $heroImage->subtitle = $this->subtitle;
            $heroImage->button_text = $this->buttonText;
            $heroImage->button_url = $this->buttonUrl;

            // Handle new background image upload if present
            if ($this->newBackground) {
                $path = 'storage/'.$this->newBackground->store('hero_images', 'public');
                $heroImage->image = $path;
            }

            $heroImage->save();

            DB::commit();

            $this->success('Hero image berhasil diubah.');
            $this->dispatch('setHeroImageEditModal', false);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Gagal pengubah data hero image.');
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.homepage.hero-image.edit');
    }
}
