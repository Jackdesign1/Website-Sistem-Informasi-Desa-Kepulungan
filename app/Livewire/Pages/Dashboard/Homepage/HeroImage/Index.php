<?php

namespace App\Livewire\Pages\Dashboard\Homepage\HeroImage;

use App\Models\HomepageHeroImage;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast;
    public $createModalState = false;
    public $deleteModalState = false;
    public $editModalState = false;
    public $selectedKey;
    public $editKey = '';

    #[On('setHeroImageCreateModal')]
    public function setHeroImageCreateModal($state) {
        $this->createModalState = $state;
    }
    #[On('setHeroImageEditModal')]
    public function setHeroImageEditModal($state) {
        $this->editModalState = $state;
    }

    public function heroImage()
    {
        return HomepageHeroImage::orderBy('order', 'asc')->get();
    }

    public function delete() {
        try {
            DB::beginTransaction();
            $heroImage = HomepageHeroImage::findOrFail(decrypt($this->selectedKey));
            $heroImage->delete();

            HomepageHeroImage::where('order', '>', $heroImage->order)->decrement('order');

            $this->dispatch('refresh');
            $this->success('Hero image berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            $this->error('Gagal menghapus hero image.', 'Terjadi kesalahan saat menghapus hero image.');
        } finally {
            $this->deleteModalState = false;
            DB::commit();
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.homepage.hero-image.index', [
            'heroImages' => $this->heroImage(),
        ]);
    }
}
