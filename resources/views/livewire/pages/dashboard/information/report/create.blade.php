<x-dashboard-container>
    <x-mary-modal wire:model="createModalState" title="Publish" class="backdrop-blur">
        Pastikan report yang anda tulis sudah benar

        <x-slot:actions>
            <x-mary-button type="submit" label="Publish" class="join-item btn-success" form="create-news" spinner="create"/>
            <x-mary-button label="Cancel" @click="$wire.createModalState = false" />
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
                wire:model="imageFiles"                 {{-- Temprary files --}}
                wire:library="library"             {{-- Library metadata property --}}
                :preview="$library"                {{-- Preview control --}}
                label="Upload Gambar Slide"
                hint="Max 2Mb"
                crop-text="false"
                class="crop-false"/>

            <x-mary-editor wire:model="description" folder="/news" label="Deskripsi" hint="Isi Konten" :config="$config" />

            <div>
                <x-mary-file wire:model="reportFiles" label="Upload File" hint="Only PDF" accept="application/pdf" multiple/>
                <div class="flex flex-wrap gap-5">
                    @foreach ($reportFiles as $reportFile)
                        <div>
                            <div class="text-center">
                                <x-mary-icon name='tabler.file-description' class="w-16 h-16 mb-2"></x-mary-icon>
                            </div>
                            <a href="{{ asset($reportFile->temporaryUrl()) }}" target="blank" class="link max-w-32 line-clamp-2 link-hover text-primary" title="{{ $reportFile->getClientOriginalName() }}">{{ $reportFile->getClientOriginalName() }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-mary-form>
    </div>
</x-dashboard-container>
