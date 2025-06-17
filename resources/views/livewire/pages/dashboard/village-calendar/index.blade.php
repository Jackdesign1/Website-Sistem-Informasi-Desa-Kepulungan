<x-dashboard-container>
    <x-mary-modal wire:model='createModalState' persistent >
        <livewire:pages.dashboard.village-calendar.create />
    </x-mary-modal>

    <x-mary-modal wire:model='editModalState' persistent >
        <livewire:pages.dashboard.village-calendar.edit />
    </x-mary-modal>

    <x-mary-header title="Kalender Desa" progress-indicator separator />

    {{-- @dump($values->count(), $values) --}}

    <div class="md:px-5 calendar-container" x-data='evoCalendar(@json($events))'>
        <div id="calendar" class="rounded-xl" x-init="initialize($el)" wire:key='{{ now() }}'></div>
        <div class="flex flex-wrap justify-end gap-3 mt-5">
            <x-mary-button
                wire:click="delete"
                wire:show="isEventSelected && $wire.selectedEvent"
                wire:confirm='Apakah anda yakin ingin menghapus event ini?'
                label="Hapus"
                icon="tabler.trash"
            />
            <x-mary-button
                wire:show="isEventSelected && $wire.selectedEvent"
                x-on:click="editHandler"
                label="Edit"
                class="btn-warning"
                icon="tabler.edit"
            />
            <div class="flex gap-3">
                <x-mary-button
                    wire:show="isDateSelected"
                    x-on:click="createHandler"
                    wire:cloack
                    label="Tambah Acara"
                    class="btn-success"
                    icon="tabler.plus"
                />
                <x-mary-button
                    disabled
                    wire:show="!isDateSelected"
                    wire:cloack
                    label="Tambah Acara"
                    class="btn-success"
                    icon="tabler.plus"
                />
            </div>
        </div>
    </div>
</x-dashboard-container>

@script
    <script>
        Alpine.data('evoCalendar', (event) => {
            const events = event;
            return {
                initialize: (el) => {
                    $(el).evoCalendar(events)
                    $(el).on('selectDate', (e, activeDate) => {
                        $wire.isDateSelected = true
                        $wire.selectedDate = Date.parse(activeDate).toString('yyyy-MM-dd')
                    })
                    $(el).on('selectEvent', (e, activeEvent) => {
                        $wire.isEventSelected = true
                        $wire.selectedEvent = {
                            key: activeEvent.id,
                            name: activeEvent.name
                        }
                    })
                },
                editHandler: () => {
                    $wire.editModalState = true;
                    $wire.dispatch('initEditVillageCalendar', {key: $wire.selectedEvent.key})
                },
                createHandler: () => {
                    $wire.createModalState = true;
                    $wire.dispatch('initCreateVillageCalendar', {'selectedDate': $wire.selectedDate})
                }
            }
        })

        document.addEventListener('livewire:navigating', () => {
            $('#calendar').evoCalendar('destroy')
        })
        document.addEventListener('click', (e) => {
            if ($(e.target).closest('.calendar-container').length == 0) {
                $wire.isEventSelected = false
                $wire.selectedEvent = null
            }
        })
    </script>
@endscript
