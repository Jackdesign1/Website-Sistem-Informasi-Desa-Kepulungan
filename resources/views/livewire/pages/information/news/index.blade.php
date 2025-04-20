<div class="flex flex-col gap-5">
    {{ $news->links(data: ['scrollTo' => '#news-content']) }}
    <div class="flex flex-wrap gap-5">
        @foreach ($news as $item)
            <x-mary-card :title="$item->title" class="border shadow-lg flex-1 min-w-64">
                <span class="line-clamp-3">{!! Str::limit($item->content, 200) !!}</span>

                <x-slot:figure>
                    @if ($item->media->first()->url)
                        <img src="{{ asset($item->media->first()->url) }}" class="aspect-[2/1] object-cover"/>
                    @else
                        <div class="w-full aspect-[2/1] skeleton"></div>
                    @endif
                </x-slot:figure>
                <x-slot:menu>
                    <x-mary-button icon="o-share" class="btn-circle btn-sm" />
                </x-slot:menu>
                <x-slot:actions separator>
                    <x-mary-button label="Baca Selengkapnya" class="btn-primary" :link="route('information.news-content', ['type' => $item->type, 'slug' => $item->slug])"/>
                </x-slot:actions>
            </x-mary-card>
        @endforeach
    </div>
    {{ $news->links(data: ['scrollTo' => '#news-content']) }}
</div>
