<div>
    <x-mary-header title="Edit Program Desa" separator progress-indicator />

    <x-mary-form class="flex flex-col gap-2" no-separator wire:submit='create'>
        <x-mary-input type="text" wire:model='title' label="Judul" required />
        <x-mary-select
            wire:model='status'
            label="Status"
            :options="$statusOptions"
            option-value="key"
            option-label="label"
        />
        <x-mary-input wire:model='budget' label="Anggaran" prefix="Rp." money />
        <x-mary-input type="date" wire:model='start_date' label="Tanggal Mulai" />
        <x-mary-input type="date" wire:model='end_date' label="Tanggal Selesai" />
        <x-mary-textarea wire:model='description' label="Deskripsi" />

        <x-slot:actions>
            {{-- <x-mary-button class="mt-4" label="Reset" wire:click='resetPage' class="btn-secondary" /> --}}
            <x-mary-button label="Edit Program" icon="tabler.plus" type="submit" class="btn-success" spinner="create" />
        </x-slot:actions>
    </x-mary-form>
</div>
