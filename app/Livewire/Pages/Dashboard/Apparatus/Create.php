<?php

namespace App\Livewire\Pages\Dashboard\Apparatus;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\Apparatus;
use Livewire\Attributes\Lazy;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads, Toast;

    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|min:3')]
    public $position;
    #[Validate('required|min_digits:18|max_digits:18|integer')]
    public $nipd;
    #[Validate('required|image|max:2048')]
    public $image;

    public function create() {
        $this->validate();

        try {
            $imagePath = $this->image->store('apparatuses', 'public');
        } catch (\Exception $e) {
            $this->error('Kesalahan mengupload gambar');
            return;
        }

        try {
            Apparatus::create([
                'name' => $this->name,
                'position' => $this->position,
                'nipd' => $this->nipd,
                'image' => 'storage/' . $imagePath,
            ]);
        } catch (\Exception $e) {
            $this->error('Kesalahan menyimpan data');
            return;
        };
        $this->success('Data berhasil ditambahkan');
        $this->dispatch('setApparatusCreateModal', false);
        $this->dispatch('refreshApparatusIndex', false);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.apparatus.create');
    }
}
