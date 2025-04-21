<x-dashboard-container>
    <x-mary-header title="Berita" progress-indicator separator>
        <x-slot:actions>
            <x-mary-button label="Tambah" icon="tabler.user-plus" class="btn-primary" :link="route('dashboard.information.news.create')"/>
        </x-slot:actions>
    </x-mary-header>

    {{-- @foreach ($news as $item)
        <x-mary-list-item :item="[]">
            <x-slot:avatar>
                <img src="{{ asset($item->media->first()->url) }}" alt="Avatar" class="object-cover w-24 rounded aspect-square">
            </x-slot:avatar>
            <x-slot:value>
                {{ $item->title }}
            </x-slot:value>
            <x-slot:sub-value>
                {!! $item->content !!}
            </x-slot:sub-value>
            <x-slot:actions>
                <x-button icon="o-trash" class="btn-sm" wire:click="delete(1)" spinner />
            </x-slot:actions>
        </x-mary-list-item>
    @endforeach --}}

    <ul class="flex flex-col gap-3 rounded-lg">
        @foreach ($news as $item)
            <li class="flex gap-3 p-4 border rounded-lg shadow-lg" x-data="{showMore: false}">
                <div class="flex items-center gap-3">
                    <img class="object-cover h-24 min-w-24 aspect-square rounded-box" src="{{ asset($item->media->first()->url) }}"/>
                </div>
                <div>
                    <div class="mb-1.5 capitalize text-lg">
                        <div class="font-semibold">
                            <a href="#">{{ $item->title }}</a>
                        </div>
                        <div class="text-xs opacity-60">{{ $item->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="text-sm line-clamp-3">
                        <a href="#">
                            {{ $item->content }}
                        </a>
                    </div>
                </div>
                <div class="flex gap-0.5">
                    <x-mary-button icon="o-trash" class="btn-square btn-ghost"></x-mary-button>
                    <x-mary-button icon="o-eye" class="btn-square btn-ghost"></x-mary-button>
                </div>
            </li>
        @endforeach
    </ul>
</x-dashboard-contain>
