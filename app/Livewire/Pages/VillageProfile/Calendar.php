<?php

namespace App\Livewire\Pages\VillageProfile;

use App\Models\VillageCalendar;
use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{
    public function getCalendarProperty() {
        $villageCalendars = VillageCalendar::where(function($query) {
            $today = Carbon::today()->toDateString();
            $query->where('start_date', '>=', $today)
                ->orWhere(function($q) use ($today) {
                    $q->where('start_date', '<=', $today)
                    ->where('end_date', '>=', $today);
                });
        })->get();
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
        return view('livewire.pages.village-profile.calendar', [
            'events' => $events,
        ]);
    }
}
