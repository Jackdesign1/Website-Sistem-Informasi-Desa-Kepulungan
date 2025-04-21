<x-dashboard-container>
    <x-mary-header title="Buat Berita Baru" separator progress-indicator="create"/>

    <div class="px-5">
        <x-mary-form wire:submit='create'>
            <x-mary-image-library
                wire:model="files"                 {{-- Temprary files --}}
                wire:library="library"             {{-- Library metadata property --}}
                :preview="$library"                {{-- Preview control --}}
                label="Product images"
                hint="Max 100Kb" />

            <x-mary-input class="input-lg" label="Judul Berita">
                <x-slot:append>
                    <x-mary-button type="submit" label="Publish" class="join-item btn-success btn-lg" spinner="create"/>
                </x-slot:append>
            </x-mary-input>
            <x-mary-editor wire:model.live.debounce="content" label="Content" hint="Isi Konten" :config="$config" />
        </x-mary-form>

        {{ $content }}
    </div>
</x-dashboard-container>
