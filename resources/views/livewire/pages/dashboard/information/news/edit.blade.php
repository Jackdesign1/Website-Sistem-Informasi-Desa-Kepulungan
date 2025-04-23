<x-dashboard-container>
    <x-mary-modal wire:model="editNewsModal" title="Publish" class="backdrop-blur">
        Pastikan artikel yang anda tulis sudah benar

        <x-slot:actions>
            <x-mary-button type="submit" :label="$status == 'publish'? 'Simpan' : 'Publish'" class="join-item btn-success" form="edit-news" spinner="edit"/>
            <x-mary-button label="Cancel" @click="$wire.editNewsModal = false" />
        </x-slot:actions>
    </x-mary-modal>

    <x-mary-header title="Edit Berita" separator progress-indicator="edit">
        <x-slot:actions>
            <x-mary-button label="Draft" wire:click="editDraft" spinner="editDraft"/>
            <x-mary-button :label="$status == 'publish'? 'Simpan' : 'Publish'" class="btn-success" @click="$wire.editNewsModal = true"/>
        </x-slot:actions>
    </x-mary-header>

    <div class="px-5">
        <x-mary-form wire:submit='edit' id="edit-news">
			<div>

			</div>
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
    </div>
</x-dashboard-container>
