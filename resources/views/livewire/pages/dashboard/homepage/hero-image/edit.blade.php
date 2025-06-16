<x-dashboard-container>
    <x-mary-header class="!mb-5" title="Edit Gambar Hero" separator progress-indicator="edit"></x-mary-header>
    <x-mary-form wire:submit='edit'>
        <div class="relative w-auto group">
            <x-mary-file wire:model="newBackground" label="Gambar Background" accept="image/png, image/jpeg" crop-after-change class="z-20 relative">
                <img src="{{ asset('assets/icons/blank-transparent.png') }}" class="h-40 rounded-lg w-full" />
            </x-mary-file>
            @if ($background && !$newBackground)
                <div class="absolute bottom-0 left-0 z-10 mb-2 transition group-hover:scale-105">
                    <img src="{{ asset($background) }}" class="h-40 w-auto object-cover rounded-lg" />
                </div>
            @endif
        </div>

        <div class="block md:hidden">
            <x-mary-textarea wire:model.live.debounce='title' label="Judul Gambar Hero" icon="o-tag" placeholder="Judul Gambar Hero" />
            <x-mary-textarea wire:model.live.debounce='subtitle' label="Sub Judul Gambar Hero" icon="o-tag" placeholder="Sub Judul Gambar Hero" />
        </div>
        <div class="hidden md:block">
            <x-mary-input wire:model.live.debounce='title' label="Judul Gambar Hero" placeholder="Judul Gambar Hero" />
            <x-mary-input wire:model.live.debounce='subtitle' label="Sub Judul Gambar Hero" placeholder="Sub Judul Gambar Hero" />
        </div>
        <div class="flex flex-col md:flex-row md:gap-3 ">
            <div class="flex-1">
                <x-mary-input wire:model.live.debounce='buttonText' label="Teks Tombol CTA" placeholder="Selengkapnya...." />
            </div>
            <div class="flex-1">
                <x-mary-input wire:model.live.debounce='buttonUrl' label="URL Tombol CTA" placeholder="https://..." />
            </div>
            <div class="md:flex-shrink">
                <x-mary-input wire:model.live.debounce='newOrder' type="number" label="Urutan" placeholder="1" hint="Urutan mana untuk ini tampil(Mulai dari 1)" min="1"/>
            </div>
        </div>

        <x-slot:actions>
            <x-mary-button type="submit" label="Simpan" class="btn-success" spinner="edit"/>
        </x-slot:actions>
    </x-mary-form>
</x-dashboard-container>
