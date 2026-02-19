<x-dashboard-container>
    <x-mary-modal wire:model="createEditDetailModal">
        <livewire:pages.dashboard.village-program.create-detail />
    </x-mary-modal>

    <x-mary-header title="Edit Program Desa" separator progress-indicator />

    <x-mary-form no-separator wire:submit="edit" class="md:px-5">
        <div class="flex flex-col sm:gap-3 sm:flex-row">
            <div class="flex-1">
                <x-mary-input wire:model.live.debounce='year' disabled label="Tahun Program Desa" icon="o-calendar" placeholder="2025" />
            </div>
        </div>

        <div class="flex flex-col flex-wrap gap-2 sm:items-center sm:justify-between sm:flex-row">
            <span>List Program Desa</span>
        </div>
        <x-mary-accordion wire:model='accordionState'>
            @forelse ($villageProgramDetails as $index => $detail)
                <x-village-program.modify-card state="edit" :$loop :$index :$detail />
            @empty
                <x-village-program.modify-placeholder />
            @endforelse
        </x-mary-accordion>
        <x-mary-button class="btn-success btn-sm" label="Program Baru" icon="tabler.plus" wire:click="createEditDetailModal = true"></x-mary-button>

        <x-slot:actions>
            {{-- <x-mary-button label="Reset" wire:click="resetPage" spinner="resetPage"/> --}}
            <x-mary-button label="Simpan Perubahan" icon="tabler.plus" type="submit" class="btn-primary" spinner="edit" />
        </x-slot:actions>
    </x-mary-form>
</x-dashboard-container>
