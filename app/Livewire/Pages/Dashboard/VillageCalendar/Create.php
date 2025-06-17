<?php

namespace App\Livewire\Pages\Dashboard\VillageCalendar;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\VillageCalendar;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    use Toast;
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
    // public $timeRangeConfig = [
    //     'enableTime' => true,
    //     'noCalendar' => true,
    //     'time_24hr' => true,
    //     'altFormat' => 'H:i',
    // ];

    public function resetPage() {
        $this->reset([
            'date',
            'startTime',
            'endTime',
            'description',
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

    public function updatedEndTime($value)
    {
        if ($this->startTime && $value) {
            $start = strtotime($this->startTime);
            $end = strtotime($value);
            if ($end <= $start) {
                $this->addError('endTime', 'End time must be after start time.');
            } else {
                $this->resetErrorBag('endTime');
            }
        }
    }

    public function create()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            $dates = explode(" to ", $this->date);
            $startDate = isset($dates[0]) ? explode(' ', $dates[0])[0] : null;
            $endDate = isset($dates[1]) ? explode(' ', $dates[1])[0] : null;

            VillageCalendar::create([
                'title' => $this->title,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'start_time' => $this->startTime,
                'end_time' => $this->endTime,
                'description' => $this->description
            ]);

            $successMessage = 'Event baru pada '.date('d-M-Y', strtotime($startDate));
            if ($endDate) {
                $successMessage .= ' hingga '.date('d-M-Y', strtotime($startDate));
            }
            $successMessage .= ' berhasil dibuat';
            DB::commit();
            $this->reset();
            $this->dispatch('setCreateModalState', false);
            $this->success('Event berhasil ditambahkan', 'Event baru pada '.date('d-M-Y', strtotime($startDate)).' berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            $this->error('Gagal menambahkan event, coba sesaat lagi');
        }
    }

    #[On('initCreateVillageCalendar')]
    public function initCreateVillageCalendar($selectedDate)
    {
        $this->dateRangeConfig['defaultDate'] = [$selectedDate];
        if (explode(' to ', $this->date)[0] !== $selectedDate) {
            $this->date = $selectedDate;
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.village-calendar.create');
    }
}
