<?php

namespace App\Livewire\Pages\Homepage;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\VillageCalendar as ModelsVillageCalendar;

class VillageCalendar extends Component
{
    public function getRandomColor() {
        return collect([
            '!bg-amber-200',
            '!bg-red-200',
            '!bg-blue-200',
            // '!bg-yellow-200',
            // '!bg-purple-200',
            // '!bg-indigo-200',
            // '!bg-teal-200',
            // '!bg-orange-200',
            '!bg-cyan-200',
            '!bg-lime-200',
        ])->random();
    }

    public function getCalendarProperty() {
        // [
        //     'label' => 'Day off',
        //     'description' => 'Playing <u>tennis.</u>',
        //     'css' => '!bg-amber-200',
        //     'date' => now()->startOfMonth()->addDays(3),
        //      OR
        //     'range' => [
        //         now()->startOfMonth()->addDays(13),
        //         now()->startOfMonth()->addDays(15)
        //     ]
        // ],
        $villageCalendars = ModelsVillageCalendar::where(function($query) {
            $today = Carbon::today()->toDateString();
            $query->where('start_date', '>=', $today)
                ->orWhere(function($q) use ($today) {
                    $q->where('start_date', '<=', $today)
                    ->where('end_date', '>=', $today);
                });
        })->get();
        $events = $villageCalendars->map(function($event) {
            $data = [
                'label' => $event->title,
                'description' => $event->description,
                'css' => $this->getRandomColor(),
            ];

            if ($event->start_date && $event->end_date) {
                $data['range'] = [
                    Carbon::parse($event->start_date),
                    Carbon::parse($event->end_date)
                ];
            } else {
                $data['date'] = Carbon::parse($event->start_date);
            }

            // $badge = '';
            // if ($event->time_start) $badge = Carbon::parse($event->time_start)->translatedFormat('H:i');
            // if ($event->time_end) $badge .= ' - '.Carbon::parse($event->time_end)->translatedFormat('H:i');

            // $data['badge'] = $badge;
            return $data;
        });

        return $events->toArray();
    }

    public function render()
    {
        return view('livewire.pages.homepage.village-calendar', [
            'events' => $this->getCalendarProperty(),
        ]);
    }
}
