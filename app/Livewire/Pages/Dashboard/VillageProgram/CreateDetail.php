<?php

namespace App\Livewire\Pages\Dashboard\VillageProgram;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class CreateDetail extends Component
{
    public $statusOptions = [
        ['key' => 'planned', 'label' => 'Perencanaan'],
        ['key' => 'in_progress', 'label' => 'Berjalan'],
        ['key' => 'completed', 'label' => 'Selesai']
    ];

    // variables needed for editing
    // key represent encrypted id from the villageProgramDetail
    public $key;
    // index represents the position of the data in the array
    public $index;
    // state of this function, is it create or edit.
    public $state = 'create';

    #[Validate('required|string|max:255')]
    public $title;
    #[Validate('nullable|string')]
    public $description;
    #[Validate('required|in:planned,in_progress,completed')]
    public $status = 'planned';
    #[Validate('nullable|min:0')]
    public $budget;
    #[Validate('nullable|date|required_with:villageProgramDetails.*.end_date')]
    public $start_date;
    #[Validate('nullable|date')]
    public $end_date;

    public function resetPage() {
        $this->reset();
    }

    public function create() {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'budget' => $this->budget,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];

        $this->dispatch('addDetailProgram', $data);
    }

    #[On('initEditDetail')]
    public function initEditDetail($data, $index) {
        $this->index = $index;
        $this->key = $data['key'];
        $this->title = $data['title'];
        $this->description = $data['description']?? null;
        $this->status = $data['status'];
        $this->budget = $data['budget']?? null;
        $this->start_date = $data['start_date']?? null;
        $this->end_date = $data['end_date']?? null;
        $this->state = 'edit';
    }

    public function edit() {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'budget' => $this->budget,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];

        if($this->key) $data['key'] = $this->key;

        $this->dispatch('addEditDetailProgram', $data, $this->index);
    }

    public function createOrEdit() {
        $this->validate();

        if ($this->state == 'create') $this->create();
        else $this->edit();

        $this->reset();
        $this->dispatch('resetCreateEditDetailForm');
    }

    public function render()
    {
        return view('livewire.pages.dashboard.village-program.create-detail');
    }
}
