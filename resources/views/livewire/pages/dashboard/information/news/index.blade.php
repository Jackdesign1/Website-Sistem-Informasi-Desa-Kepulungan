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

    <div class="flex flex-col gap-3 rounded-lg">
        @foreach ($news as $item)
            <div class="relative flex flex-col max-w-full gap-3 p-6 overflow-hidden border rounded-lg shadow-lg sm:flex-row">
                <div class="flex items-center gap-3">
                    <img class="object-cover w-full max-h-28 sm:w-auto sm:h-24 min-w-24 aspect-square rounded-box" src="{{ asset($item->media->first()->url) }}"/>
                </div>
                <div class="flex-1">
                    <x-mary-avatar :placeholder="getInitials($item->user->name?? '-')" :title="$item->user->name?? '-'" :subtitle="$item->created_at->format('d M Y')" class="!w-10" />
                    <div class="mt-3 text-lg capitalize">
                        <div class="font-semibold">
                            <a href="{{ route('dashboard.information.news.edit', ['key' => Crypt::encrypt($item->id)]) }}">{{ $item->title }}</a>
                        </div>
                        {{-- <div class="text-xs opacity-60">{{ $item->created_at->diffForHumans() }}</div> --}}
                    </div>
                    <div class="hidden text-sm line-clamp-3 sm:block">
                        <a href="{{ route('dashboard.information.news.edit', ['key' => Crypt::encrypt($item->id)]) }}">
                            <div class="max-w-lg max-h-32 tinymce-content">
                                {!! truncateHTML($item->content, 200) !!}
                            </div>
                        </a>
                    </div>
                </div>
                <div class="flex gap-0.5 flex-col">
                    <div class="justify-end flex-1 hidden sm:flex">
                        {{-- <x-mary-button icon="o-eye" tooltip="lihat" class="btn-circle !tooltip-bottom btn-ghost btn-sm"></x-mary-button> --}}
                        <x-mary-button icon="tabler.edit" tooltip="edit" class="btn-circle !tooltip-bottom btn-ghost btn-sm" :link="route('dashboard.information.news.edit', ['key' => Crypt::encrypt($item->id)])"></x-mary-button>
                        <x-mary-button icon="o-trash" tooltip="hapus" class="btn-circle !tooltip-bottom btn-ghost btn-sm" wire:click="deleteModalState = true; $wire.selectedKey = '{{ Crypt::encrypt($item->id) }}'"></x-mary-button>
                    </div>
                    <div class="flex items-center justify-between sm:justify-end">
                        <div class="flex-1 sm:hidden">
                            {{-- <x-mary-button icon="o-eye" tooltip="lihat" class="btn-circle !tooltip-bottom btn-ghost btn-sm"></x-mary-button> --}}
                            <x-mary-button icon="tabler.edit" tooltip="edit" class="btn-circle !tooltip-bottom btn-ghost btn-sm" :link="route('dashboard.information.news.edit', ['key' => Crypt::encrypt($item->id)])"></x-mary-button>
                            <x-mary-button icon="o-trash" tooltip="hapus" class="btn-circle !tooltip-bottom btn-ghost btn-sm" wire:click="deleteModalState = true; $wire.selectedKey = '{{ Crypt::encrypt($item->id) }}'"></x-mary-button>
                        </div>
                        <x-mary-button :label="$item->status == 'publish'? 'published' : 'draft'" class="{{ $item->status == 'publish'? 'btn-success' : '' }} capitalize"
                            @click="$wire.statusModalState = true; newsStatus = '{{ $item->status }}'; $wire.selectedKey = '{{ Crypt::encrypt($item->id); }}'" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-dashboard-contain>
