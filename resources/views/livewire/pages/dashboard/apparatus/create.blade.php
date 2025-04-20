<x-mary-form no-separator wire:submit="create">
    <x-mary-header title="Tambah Aparatur" separator progress-indicator="create" class="!mb-3"/>
    <x-mary-input wire:model.live.debounce="name" label="Nama" placeholder="Masukkan nama lengkap" />
    <x-mary-input wire:model.live.debounce="position" label="Jabatan" placeholder="Masukkan Jabatan" />
    <x-mary-input wire:model.live.debounce="nipd" label="NIPD" placeholder="......" max="18"/>
    <x-mary-file wire:model.live.debounce="image" label="Foto Profil" accept="image/png, image/jpeg" crop-after-change>
        <img src="{{ asset('assets/icons/blank-user-profile.png') }}" class="h-40 rounded-lg" />
    </x-mary-file>

    {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
    <x-slot:actions>
        <x-mary-button label="Cancel" @click="$wire.$parent.createModal = false" />
        <x-mary-button label="Confirm" class="btn-primary" type="submit" />
    </x-slot:actions>
</x-mary-form>
