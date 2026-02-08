<div>
    <x-mary-header title="Edit Acara" progress-indicator separator />

    <x-mary-form wire:submit='edit' no-separator>
        <x-mary-input label="Judul kegiatan" wire:model='title' required></x-mary-input>
        <x-mary-datepicker label="Pilih tanggal" wire:model='date' icon="o-calendar" :config="$dateRangeConfig"></x-mary-datepicker>
        <div class="flex gap-3">
            <div class="flex-1">
                <x-mary-datetime label="Waktu mulai" wire:model='startTime' icon="o-calendar" type="time"></x-mary-datetime>
            </div>
            <div class="flex-1">
                <x-mary-datetime label="Waktu selesai" wire:model='endTime' icon="o-calendar" type="time"></x-mary-datetime>
            </div>
        </div>
        <x-mary-textarea label="Deskripsi Event" wire:model='description' placeholder="Deskripsi acara event kegiatan"/>
        <x-slot:actions>
            <x-mary-button label="Cancel" class="mt-5" icon="tabler.x" wire:click='$parent.editModalState = false; $wire.resetPage()' />
            <x-mary-button type="submit" label="Simpan" class="mt-5 btn-success" icon="tabler.check" spinner="edit" />
        </x-slot:actions>
    </x-mary-form>
</div>
