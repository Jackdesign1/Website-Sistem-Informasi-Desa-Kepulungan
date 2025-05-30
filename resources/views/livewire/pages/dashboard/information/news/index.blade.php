<x-dashboard-container x-data="{newsStatus: ''}">
    <x-mary-modal wire:model='statusModalState' title="Ubah Status Artikel">
        <template x-if="newsStatus == 'draft'">
            <p>Anda yakin ingin mempublikasikan berita?</p>
        </template>
        <template x-if="newsStatus == 'publish'">
            <p>Tarik publikasi berita? <br> Berita yang ditarik akan masuk ke list draft</p>
        </template>
    <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.statusModalState = false" />
            <x-mary-button x-text="newsStatus == 'draft'? 'Publish' : 'Draft'" wire:click="changeStatus()" spinner="changeStatus" class=" btn-warning" />
        </x-slot:actions>
    </x-mary-modal>

    <x-mary-modal wire:model='deleteModalState' title="Ubah Status Artikel">
        Anda yakin ingin menghapus berita ini?
        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.deleteModalState = false" />
            <x-mary-button label="Hapus" wire:click="delete()" spinner="delete" class=" btn-warning" />
        </x-slot:actions>
    </x-mary-modal>


    <x-mary-header title="Berita" progress-indicator separator>
        <x-slot:actions>
            <x-mary-button label="Tambah" icon="tabler.plus" class="btn-primary" :link="route('dashboard.information.news.create')"/>
        </x-slot:actions>
    </x-mary-header>

    <ul class="flex flex-col gap-3 rounded-lg">
        @foreach ($news as $item)
            <li class="relative flex gap-3 p-6 overflow-hidden border rounded-lg shadow-lg max-h-52">
                <div class="absolute bottom-0 left-0 right-0 z-20 h-8 bg-gradient-to-t from-white to-transparent"></div>
                <div class="flex items-center gap-3">
                    <img class="object-cover h-24 min-w-24 aspect-square rounded-box" src="{{ asset($item->media->first()->url) }}"/>
                </div>
                <div class="flex-1">
                    <div class="mb-1.5 capitalize text-lg">
                        <div class="font-semibold">
                            <a href="{{ route('dashboard.information.news.edit', ['key' => Crypt::encrypt($item->id)]) }}">{{ $item->title }}</a>
                        </div>
                        <div class="text-xs opacity-60">{{ $item->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="text-sm line-clamp-4">
                        <a href="{{ route('dashboard.information.news.edit', ['key' => Crypt::encrypt($item->id)]) }}">
                            {!! $item->content !!}
                        </a>
                    </div>
                </div>
                <div class="flex gap-0.5 flex-col">
                    <div class="flex-1">
                        <x-mary-button icon="o-eye" tooltip="lihat" class="btn-circle !tooltip-bottom btn-ghost btn-sm"></x-mary-button>
                        <x-mary-button icon="tabler.edit" tooltip="edit" class="btn-circle !tooltip-bottom btn-ghost btn-sm" :link="route('dashboard.information.news.edit', ['key' => Crypt::encrypt($item->id)])"></x-mary-button>
                        <x-mary-button icon="o-trash" tooltip="hapus" class="btn-circle !tooltip-bottom btn-ghost btn-sm" @click="$wire.deleteModalState = true; $wire.selectedKey = '{{ Crypt::encrypt($item->id) }}'"></x-mary-button>
                    </div>
                    <div class="text-end">
                        <x-mary-button :label="$item->status == 'publish'? 'published' : 'draft'" class="{{ $item->status == 'publish'? 'btn-success' : '' }} capitalize"
                            @click="$wire.statusModalState = true; newsStatus = '{{ $item->status }}'; $wire.selectedKey = '{{ Crypt::encrypt($item->id); }}'" />
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</x-dashboard-contain>
