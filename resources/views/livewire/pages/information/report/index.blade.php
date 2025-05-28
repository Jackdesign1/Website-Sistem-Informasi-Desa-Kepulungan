<div class="flex flex-col gap-5">
    {{ $reports->links(data: ['scrollTo' => '#news-content']) }}
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
        @if ($reports->count() > 0)
            @foreach ($reportChunks as $chunk)
                <div class="flex flex-col gap-5">
                    @foreach ($chunk as $report)
                        <div>
                            <x-mary-card :title="$report->title" :subtitle="$report->updated_at->diffForHumans()" class="flex-1 max-w-md border shadow-lg min-w-64">
                                <span class="line-clamp-3">{{ $report->description }}</span>
                                <x-slot:figure>
                                    @if ($report->imageMedia->first()->url)
                                        <img src="{{ asset($report->imageMedia->first()->url) }}" class="aspect-[2/1] object-cover"/>
                                    @else
                                        <div class="w-full aspect-[2/1] skeleton"></div>
                                    @endif
                                </x-slot:figure>
                                <x-slot:menu>
                                    <x-mary-button icon="o-share" class="btn-circle btn-sm" />
                                </x-slot:menu>
                                <x-slot:actions separator>
                                    <div class="flex justify-between flex-1">
                                        <x-mary-dropdown label="Report">
                                            @foreach ($report->fileMedia as $fileMedia)
                                                <x-mary-menu-item title="{{ $fileMedia->name }}" :link="$fileMedia->url" external icon="tabler.file-description" />
                                            @endforeach
                                        </x-mary-dropdown>
                                        <x-mary-button label="Baca Selengkapnya" class="btn-primary" :link="route('information.news-content', ['type' => $report->type, 'slug' => $report->slug])"/>
                                    </div>
                                </x-slot:actions>
                            </x-mary-card>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="flex-1 text-center">
                <h3 class="text-xl">Tidak ada laporan</h3>
            </div>
        @endif
    </div>
    {{ $reports->links(data: ['scrollTo' => '#news-content']) }}
</div>

