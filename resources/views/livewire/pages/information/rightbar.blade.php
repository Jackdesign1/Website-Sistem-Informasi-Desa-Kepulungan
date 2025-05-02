<div>
    @if ($news->count() > 0)
        <div>
            <x-header class="text-lg">Berita Terbaru</x-header>
            <div class="px-4">
                <ul class="bg-gray-100 rounded-lg list">
                    @foreach ($news as $item)
                        <li class="list-row">
                            <div><img class="size-10 rounded-box" src="{{ asset($item->imageMedia->first()->url) }}"/></div>
                            <div>
                                <div><a href="{{ route('information.news-content', ['type' => 'news', 'slug' => $item->slug]) }}">{{ $item->title }}</a></div>
                                <div class="text-xs font-semibold capitalize opacity-60">{{ $item->updated_at->diffForHumans() }}</div>
                            </div>
                            <div class="text-xs list-col-wrap line-clamp-4 max-h-20">
                                {!! Str::limit($item->content, 255) !!}
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="text-center">
                    <x-mary-button label="Lihat Semua" :link="route('information.index')" icon-right="tabler.arrow-narrow-right" class="btn-ghost btn-sm"></x-mary-button>
                </div>
            </div>
        </div>
    @endif

    @if ($reports->count() > 0)
        <div>
            <x-header class="text-lg">Laporan Terbaru</x-header>
            <div class="px-4">
                <ul class="bg-gray-100 rounded-lg list">
                    @foreach ($reports as $report)
                        <li class="list-row">
                            <div><img class="size-10 rounded-box" src="{{ asset($report->imageMedia->first()->url) }}"/></div>
                            <div>
                                <div><a href="{{ route('information.news-content', ['type' => 'report', 'slug' => $item->slug]) }}">{{ $item->title }}</a></div>
                                <div class="text-xs font-semibold capitalize opacity-60">{{ $report->updated_at->diffForHumans() }}</div>
                            </div>
                            <div class="text-xs list-col-wrap line-clamp-4 max-h-20">
                                {!! Str::limit($report->content, 255) !!}
                            </div>
                            <x-mary-dropdown label="Report" class="btn-sm">
                                @foreach ($report->fileMedia as $fileMedia)
                                    <x-mary-menu-item title="{{ $fileMedia->name }}" :link="$fileMedia->url" external icon="tabler.file-description" />
                                @endforeach
                            </x-mary-dropdown>
                        </li>
                    @endforeach
                </ul>
                <div class="text-center">
                    <x-mary-button label="Lihat Semua" :link="route('information.index')" icon-right="tabler.arrow-narrow-right" class="btn-ghost btn-sm"></x-mary-button>
                </div>
            </div>
        </div>
    @endif
</div>
