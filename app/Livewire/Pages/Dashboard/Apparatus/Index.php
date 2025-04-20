<?php

namespace App\Livewire\Pages\Dashboard\Apparatus;

use Livewire\Component;
use App\Models\Apparatus;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'refreshApparatusIndex' => '$refresh',
        'setApparatusCreateModal',
        'setApparatusEditModal',
    ];
    public $createModal = false;
    public $editModal = false;
    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    public function setApparatusCreateModal(bool $state) {
        $this->createModal = $state;
    }

    public function setApparatusEditModal(bool $state) {
        $this->editModal = $state;
    }

    public function apparatuses() {
        return Apparatus::query()
            ->orderBy(...array_values($this->sortBy))
            ->paginate(15);
    }

    public function render() {
        return view('livewire.pages.dashboard.apparatus.index', [
            'apparatuses' => $this->apparatuses()
        ]);
    }
}
