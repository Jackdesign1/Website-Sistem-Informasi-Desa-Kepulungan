<x-dashboard-container>
    {{-- <x-mary-modal wire:model="createModal" title="Buat Pendapatan Desa" box-class="max-w-4xl">
        <livewire:pages.dashboard.village-program.create />
    </x-mary-modal> --}}
    {{-- <x-mary-modal wire:model="detailModal" title="Buat Pendapatan Desa" box-class="max-w-3xl">
        <livewire:pages.dashboard.village-program.create />
    </x-mary-modal> --}}

    <x-mary-header title="Program Desa" separator progress-indicator>
        <x-slot:actions>
            {{-- <x-mary-button label="Program Desa" icon="tabler.plus" class="btn-primary" @click="$wire.createModal = true" /> --}}
            <x-mary-button label="Program Desa" icon="tabler.plus" class="btn-primary" :link="route('dashboard.village-program.create')" />
        </x-slot:actions>
    </x-mary-header>

    {{-- desktop layout --}}
    <div class="hidden grid-cols-1 gap-5 md:grid md:grid-cols-2">
        @foreach ($chunkedVillagePrograms as $villageProgramsChunk)
            <div class="flex flex-col gap-5">
                @foreach ($villageProgramsChunk as $index => $villageProgram)
                    <x-village-program.card :$villageProgram />
                @endforeach
            </div>
        @endforeach
    </div>

    {{-- mobile layout --}}
    <div class="grid grid-cols-1 gap-5 md:hidden md:grid-cols-2">
        @foreach ($villagePrograms as $index => $villageProgram)
            <x-village-program.card :$villageProgram />
        @endforeach
    </div>
</x-dashboard-container>
