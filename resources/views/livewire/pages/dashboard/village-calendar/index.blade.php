<x-dashboard-container>
    <x-mary-modal wire:model='createModalState'>
        <livewire:pages.dashboard.village-calendar.create />
    </x-mary-modal>

    <x-mary-header title="Kalender Desa" progress-indicator separator />

    <div class="md:px-5">
        <div id="calendar" class="rounded-xl"></div>
        <div class="text-right">
            <x-mary-button label="Tambah Acara" class="mt-5 btn-success" icon="tabler.plus" wire:click='createModalState = true'/>
        </div>
    </div>
</x-dashboard-container>

@script
    <script>
        const calendar = $('#calendar')
        calendar.evoCalendar({
            theme: 'Royal Navy',
            'todayHighlight' : true,
            'calendarEvents': [
                {
                    id: 'bHay68s', // Event's ID (required)
                    name: "TEst1", // Event name (required)
                    date: "{{ now()->format('F/d/Y') }}", // Event date (required)
                    type: "holiday", // Event type (required)
                    everyYear: true // Same event every year (optional)
                },
                {
                    id: 'vacation',
                    name: "Vacation Leave",
                    badge: "02/13 - 02/15", // Event badge (optional)
                    date: ["{{ now()->addDays(2)->format('F/d/Y') }}", "{{ now()->addDays(5)->format('F/d/Y') }}"], // Date range
                    description: "Vacation leave for 3 days.", // Event description (optional)
                    type: "event",
                    color: "#63d867" // Event custom color (optional)
                }
            ]
        })
        $('#calendar').on('selectDate', (event, activeEvent) => {
            console.log(event, activeEvent);
            console.log($('#calendar').evoCalendar('getActiveEvents'));
        })
    </script>
@endscript
