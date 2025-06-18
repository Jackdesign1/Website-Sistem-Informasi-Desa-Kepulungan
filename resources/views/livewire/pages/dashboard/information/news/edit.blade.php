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
            <x-mary-button :label="$status == 'publish'? 'Simpan' : 'Publish'" class="btn-success" wire:click='validateForm' />
        </x-slot:actions>
    </x-mary-header>

    <div class="md:px-5">
        <x-mary-form wire:submit='edit' id="edit-news" class="space-y-5">
            <div class="flex flex-col sm:gap-3 sm:flex-row">
                <div class="flex-1">
                    <x-mary-input wire:model.live.debounce='title' label="Judul Berita" />
                </div>
                <div class="flex-1">
                    <x-mary-input wire:model.live.debounce='slug' label="Slug" />
                </div>
            </div>

			<div>
                <span class="text-xs font-semibold">Gambar Ter-upload</span>
                <div class="relative mt-2 border rounded">
                    @foreach ($uploaded_media as $media)
                        <div class="py-2 border-b ps-16 pe-10 last:border-b-0">
                            <div class="absolute p-2 start-2">
                                <x-mary-button wire:click="removeUploadedMedia({{ $media->id }})" spinner="removeUploadedMedia" class="btn lg:tooltip lg:tooltip-top btn-sm btn-ghost btn-circle" data-tip="remove">
                                    <svg wire:loading.remove='removeUploadedMedia' class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                    </svg>
                                </x-mary-button>
                            </div>
                            <img src="{{ asset($media->url) }}" alt="" class="h-24 transition-all ease-in-out border-2 rounded-lg cursor-pointer w-fit border-base-content/10 hover:scale-105">
                        </div>
                    @endforeach
                </div>
			</div>

            <x-mary-image-library
                wire:model="files"                 {{-- Temprary files --}}
                wire:library="library"             {{-- Library metadata property --}}
                :preview="$library"                {{-- Preview control --}}
                label="Upload Gambar Slide Baru"
                hint="Max 2Mb"
                crop-text="false"
                class="crop-false"/>

            <x-mary-editor wire:model="content" folder="/news" label="Konten" hint="Isi Konten" :config="$config" />
        </x-mary-form>
    </div>
</x-dashboard-container>
