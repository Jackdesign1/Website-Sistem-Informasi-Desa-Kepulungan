<?php

namespace App\Livewire\Pages\Dashboard\VillageCalendar;

use Carbon\Carbon;
use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Models\VillageBudget;
use App\Models\VillageCalendar;

class Index extends Component
{
    use Toast;
    public $createModalState = false;
    public $editModalState = false;
    public $isDateSelected = false;
    public $selectedDate = null;
    public $isEventSelected = false;
    public $selectedEvent = null;

    public $listeners = ["setCreateModalState", "setEditModalState"];

    public function delete() {
        try {
            $event = VillageCalendar::find(decrypt($this->selectedEvent["key"]));
            $event->delete();
            $this->isDateSelected = false;
            $this->selectedDate = null;
            $this->isEventSelected = false;
            $this->selectedEvent = null;
            $this->success("Event \"$event->title\" berhasil dihapus dari kalender");
        } catch (\Exception $e) {
            $this->error("Event gagal dihapus dari kalender");
        }
    }

    public function setCreateModalState($state) {
        $this->createModalState = $state;
    }
    public function setEditModalState($state) {
        $this->editModalState = $state;
    }

    public function getCalendarProperty() {
        $villageCalendars = VillageCalendar::get();
        $events = $villageCalendars->map(function($event) {
            $data = [
                'id' => encrypt($event->id),
                'name' => $event->title,
                'date' => [
                    Carbon::parse($event->start_date)->format('F/d/Y'),
                    $event->end_date? Carbon::parse($event->end_date)->format('F/d/Y') : null
                ],
                'description' => $event->description,
                'type' => 'event',
                'color' => '#' . strtoupper(dechex(mt_rand(0x222222, 0xFFFFFF))),
            ];

            $badge = '';
            if ($event->time_start) $badge = Carbon::parse($event->time_start)->translatedFormat('H:i');
            if ($event->time_end) $badge .= ' - '.Carbon::parse($event->time_end)->translatedFormat('H:i');

            $data['badge'] = $badge;
            return $data;
        });

        return $events;
    }

    public function render()
    {
        $events = [
            'theme' => 'Royal Navy',
            'todayHighlight' => true,
            'calendarEvents' => $this->getCalendarProperty()
        ];
        return view('livewire.pages.dashboard.village-calendar.index', [
            'events' => $events
        ]);
    }
}
