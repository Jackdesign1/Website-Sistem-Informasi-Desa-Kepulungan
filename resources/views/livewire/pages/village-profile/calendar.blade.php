<div>
    <div id="calendar" class="rounded-xl" x-data='evoCalendar(@json($events))' x-init="initialize($el)" wire:key='{{ now() }}'></div>
</div>

@script
    <script>
        Alpine.data('evoCalendar', (data) => {
            const events = data
            return {
                initialize: (el) => {
                    $(el).evoCalendar(events)
                }
            }
        })
    </script>
@endscript
