<?php

namespace App\Livewire\Pages\Galery;

use App\Models\Media;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Index extends Component
{
    public function render()
    {
        $images = Media::onlyImage()->latest()->get();
        $imageChunks = $images->chunk(ceil($images->count() / 3));
        return view('livewire.pages.galery.index', [
            'imageChunks' => $imageChunks
        ]);
    }
}
