<?php

namespace App\Livewire\Pages\Homepage;

use App\Models\HomepageHeroImage;
use Livewire\Component;

class HeroCarousel extends Component
{
    public function homepageHeroImages() {
        return HomepageHeroImage::latest('order', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.pages.homepage.hero-carousel', [
            'heroImages' => $this->homepageHeroImages()
        ]);
    }
}
