<?php

namespace App\Livewire\Pages\Dashboard\VillageCalendar;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\VillageCalendar;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Illuminate\SUpport\Facades\DB;

class Edit extends Component
{
    use Toast;
    #[Locked]
    public $key;

    #[Validate('required|min:5|max:50')]
    public $title;
    #[Validate('required')]
    public $date;
    public $startTime;
    public $endTime;
    #[Validate('max:255')]
    public $description;

    public $dateRangeConfig = [
        'mode' => 'range',
        'altFormat' => 'F j, Y',
    ];

    public function resetPage() {
        $this->reset([
            'date',
            'startTime',
            'endTime',
            'description'
        ]);
    }

    public function rules() {
        $rules = [];
        if ($this->startTime) {
            $rules['startTime'] = 'date_format:H:i';
        }
        if ($this->endTime) {
            $rules['endTime'] = 'date_format:H:i';
        }
        return $rules;
    }

    #[On('initEditVillageCalendar')]
    public function initEditVillageCalendar($key)
    {
        $this->key = $key;
        $event = VillageCalendar::find(decrypt($key));
        $this->title = $event->title;
        $this->date = "$event->start_date";
        if ($event->end_date) {
            $this->date .= " 00:00 to $event->end_date 00:00";
        }
        $this->startTime = $event->time_start;
        $this->endTime = $event->time_end;
        $this->description = $event->description;
    }

    public function edit() {
        try {
            DB::beginTransaction();

            $event = VillageCalendar::findOrFail(decrypt($this->key));

            $event->title = $this->title;
            $dates = explode(' to ', $this->date);
            $event->start_date = trim(explode(' ', $dates[0])[0]);
            $event->end_date = isset($dates[1]) ? trim(explode(' ', $dates[1])[0]) : null;
            $event->time_start = $this->startTime;
            $event->time_end = $this->endTime;
            $event->description = $this->description;
            $event->save();

            DB::commit();
            $this->dispatch('setEditModalState', false);
            $this->success(__('Event berhasil diubah.'));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            $this->error(__('Error', 'Gagal menyimpan perubahan event'));
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.village-calendar.edit');
    }
}
