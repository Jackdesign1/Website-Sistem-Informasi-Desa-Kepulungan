<div id="calendar" class="rounded-xl"></div>

@pushOnce('scripts')
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
        </script>
    @endscript
@endPushOnce
