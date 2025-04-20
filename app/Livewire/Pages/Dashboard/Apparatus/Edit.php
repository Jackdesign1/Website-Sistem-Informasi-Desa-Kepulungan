<?php

namespace App\Livewire\Pages\Dashboard\Apparatus;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\Apparatus;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Crypt;

class Edit extends Component
{
    use WithFileUploads, Toast;

    public $key;
    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|min:3')]
    public $position;
    #[Validate('required|min_digits:18|max_digits:18|integer')]
    public $nipd;

    public $image;
    #[Validate('required|image|max:2048')]
    public $newImage;

    #[On('initEditApparatus')]
    public function initEditApparatus($key) {
        $this->reset();
        $decrypted = Crypt::decrypt($key);
        $apparatus = Apparatus::find($decrypted);
        $this->key = $key;
        $this->name = $apparatus->name;
        $this->position = $apparatus->position;
        $this->nipd = $apparatus->nipd;
        $this->image = $apparatus->image;
    }

    public function edit() {
        $newImagePath = null;

        if ($this->newImage) {
            try {
                $newImagePath = $this->newImage->store('apparatuses', 'public');
            } catch (\Exception $e) {
                $this->error('Kesalahan mengupload gambar');
                return;
            }
        }

        try {
            $decrypted = Crypt::decrypt($this->key);
            $apparatus = Apparatus::find($decrypted);
            $apparatus->name = $this->name;
            $apparatus->position = $this->position;
            $apparatus->nipd = $this->nipd;
            if ($newImagePath) {
                $apparatus->image = 'storage/'.$newImagePath;
            }
            $apparatus->save();
        } catch (\Exception $e) {
            $this->error('Kesalahan mengubah data');
            return;
        }
        $this->success('Data aparatur berhasil diubah');
        $this->dispatch('setApparatusEditModal', false);
        $this->dispatch('refreshApparatusIndex', false);
    }

    public function render()
    {
        return view('livewire.pages.dashboard.apparatus.edit');
    }
}
