<?php

namespace App\Livewire\Pages\Galery;

use App\Models\Media;
use Jenssegers\Agent\Facades\Agent;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Index extends Component
{
    // public $screenWidth = null;

    // public function updatedScreenWidth() {
    //     dd($this->screenWidth);
    // }

    public $isMobile = null;

    public function mount() {
        $this->isMobile = Agent::isMobile();
    }

    public function render()
    {
        $images = Media::onlyImage()->latest()->get();
        $divisor = ($this->isMobile ? 2 : 3) ?: 1;
        $imageChunks = $images->chunk(
            $divisor > 0 ? ceil($images->count() / $divisor) : $images->count()
        );
        return view('livewire.pages.galery.index', [
            'imageChunks' => $imageChunks
        ]);
    }
}
