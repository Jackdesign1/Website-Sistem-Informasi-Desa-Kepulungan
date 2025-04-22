<x-dashboard-container>
    <x-mary-modal wire:model="createNewsModal" title="Publish" class="backdrop-blur">
        Pastikan artikel yang anda tulis sudah benar

        <x-slot:actions>
            <x-mary-button type="submit" label="Publish" class="join-item btn-success" form="create-news" spinner="create"/>
            <x-mary-button label="Cancel" @click="$wire.createNewsModal = false" />
        </x-slot:actions>
    </x-mary-modal>

    <x-mary-header title="Buat Berita Baru" separator progress-indicator="create">
        <x-slot:actions>
            <x-mary-button label="Draft" />
            <x-mary-button label="Publish" class="btn-success" @click="$wire.createNewsModal = true"/>
        </x-slot:actions>
    </x-mary-header>

    <div class="px-5">
        <x-mary-form wire:submit='create' id="create-news">
            <x-mary-image-library
                wire:model="files"                 {{-- Temprary files --}}
                wire:library="library"             {{-- Library metadata property --}}
                :preview="$library"                {{-- Preview control --}}
                label="Upload Gambar Slide"
                hint="Max 2Mb"
                crop-text="false"
                class="crop-false"/>

            <div class="flex gap-3">
                <div class="flex-1">
                    <x-mary-input wire:model.live.debounce='title' label="Judul Berita" />
                </div>
                <div class="flex-1">
                    <x-mary-input wire:model.live.debounce='slug' label="slug" />
                </div>
            </div>
            <x-mary-editor wire:model="content" folder="/news" label="Konten" hint="Isi Konten" :config="$config" />
        </x-mary-form>

        {{ $content }}
    </div>
</x-dashboard-container>
