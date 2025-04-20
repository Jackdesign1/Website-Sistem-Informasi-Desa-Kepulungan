<div class="flex flex-col gap-5">
    {{ $reports->links(data: ['scrollTo' => '#news-content']) }}
    <div class="flex flex-wrap gap-5">
        @foreach ($reports as $report)
            <x-mary-card :title="$report->title" class="border shadow-lg flex-1 min-w-64 max-w-md">
                <span class="line-clamp-3">{{ $report->description }}</span>

                <x-slot:figure>
                    @if ($report->media()->onlyImage()->first()->url)
                        <img src="{{ asset($report->media()->onlyImage()->first()->url) }}" class="aspect-[2/1] object-cover"/>
                    @else
                        <div class="w-full aspect-[2/1] skeleton"></div>
                    @endif
                </x-slot:figure>
                <x-slot:menu>
                    <x-mary-button icon="o-share" class="btn-circle btn-sm" />
                </x-slot:menu>
                <x-slot:actions separator>
                    <x-mary-button label="Baca Selengkapnya" class="btn-primary" :link="route('information.news-content', ['type' => $report->type, 'slug' => $report->slug])"/>
                </x-slot:actions>
            </x-mary-card>
        @endforeach
    </div>
    {{ $reports->links(data: ['scrollTo' => '#news-content']) }}
</div>

