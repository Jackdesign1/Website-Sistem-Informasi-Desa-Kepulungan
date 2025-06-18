<x-dashboard-container>
    <x-mary-modal wire:model="createNewsModalState" title="Publish" class="backdrop-blur">
        Pastikan artikel yang anda tulis sudah benar

        <x-slot:actions>
            <x-mary-button type="submit" label="Publish" class="join-item btn-success" form="create-news" spinner="create"/>
            <x-mary-button label="Cancel" @click="$wire.createNewsModalState = false" />
        </x-slot:actions>
    </x-mary-modal>

    <x-mary-header title="Buat Berita Baru" separator progress-indicator="create">
        <x-slot:actions>
            <x-mary-button label="Draft" wire:click="createDraft" spinner="createDraft"/>
            <x-mary-button label="Publish" class="btn-success" wire:click='showNewsModal'/>
        </x-slot:actions>
    </x-mary-header>

    <div class="sm:px-5">
        <x-mary-form wire:submit='create' id="create-news" class="space-y-5">
            <div class="flex flex-col sm:gap-3 sm:flex-row">
                <div class="flex-1">
                    <x-mary-input wire:model.live.debounce='title' label="Judul Berita" />
                </div>
                <div class="flex-1">
                    <x-mary-input wire:model.live.debounce='slug' label="slug" />
                </div>
            </div>

            <x-mary-image-library
                wire:model="files"                 {{-- Temprary files --}}
                wire:library="library"             {{-- Library metadata property --}}
                :preview="$library"                {{-- Preview control --}}
                label="Upload Gambar Slide"
                hint="Max 2Mb"
                crop-text="false"
                class="crop-false"/>

            <x-mary-editor wire:model="content" folder="/news" label="Konten" hint="Isi Konten" :config="$config" />
        </x-mary-form>
    </div>
</x-dashboard-container>
