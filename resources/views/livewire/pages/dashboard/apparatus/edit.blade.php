<x-mary-form no-separator wire:submit="edit">
    <x-mary-header title="Edit Aparatur" separator progress-indicator="create" class="!mb-3"/>
    <x-mary-input wire:model.live.debounce="name" label="Nama" placeholder="Masukkan nama lengkap" />
    <x-mary-input wire:model.live.debounce="position" label="Jabatan" placeholder="Masukkan Jabatan" />
    <x-mary-input wire:model.live.debounce="nipd" label="NIPD" placeholder="......"/>
    <div class="relative w-fit group">
        <x-mary-file wire:model.live.debounce="newImage" label="Foto Profil" accept="image/png, image/jpeg" crop-after-change class="relative z-20">
            <img src="{{ asset('assets/icons/blank-transparent.png') }}" class="h-40 rounded-lg" />
        </x-mary-file>
        @if ($image && !$newImage)
            <div class="absolute bottom-0 left-0 right-0 z-10 mb-2 transition group-hover:scale-105">
                <img src="{{ asset($image) }}" class="h-40 rounded-lg" />
            </div>
        @endif
    </div>

    {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
    <x-slot:actions>
        <x-mary-button label="Cancel" @click="$wire.$parent.editModal = false" />
        <x-mary-button label="Confirm" class="btn-primary" type="submit" />
    </x-slot:actions>
</x-mary-form>
