<x-dashboard-container>
    <x-mary-header class="!mb-5" title="Buat Gambar Hero" separator progress-indicator="create"></x-mary-header>
    <x-mary-form wire:submit='create'>
        <x-mary-file wire:model.live.debounce="background" label="Gambar Background" accept="image/png, image/jpeg" crop-after-change>
            <img src="{{ asset('assets/icons/blank-image.png') }}" class="h-40 rounded-lg" />
        </x-mary-file>

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
                <x-mary-input wire:model.live.debounce='order' type="number" label="Urutan" placeholder="1" hint="Urutan mana untuk ini tampil(Mulai dari 1)" min="1"/>
            </div>
        </div>

        <x-slot:actions>
            <x-mary-button type="submit" label="Simpan" class="btn-success" spinner="create"/>
        </x-slot:actions>
    </x-mary-form>
</x-dashboard-container>
