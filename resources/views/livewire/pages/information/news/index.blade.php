<div class="flex flex-col gap-5">
    {{ $news->links(data: ['scrollTo' => '#news-content']) }}
    <div class="flex flex-wrap gap-5">
        @if ($news->count() > 0)
            @foreach ($news as $item)
                <x-mary-card :title="$item->title" class="flex-1 border shadow-lg min-w-64 ">
                    <a href="{{ route('information.news-content', ['type' => 'news', 'slug' => $item->slug]) }}" class="line-clamp-3">{!! Str::limit($item->content, 200) !!}</a>
                    <x-slot:figure>
                        <a href="{{ route('information.news-content', ['type' => 'news', 'slug' => $item->slug]) }}">
                            @if ($item->imageMedia->first()->url)
                                <img src="{{ asset($item->imageMedia->first()->url) }}" class="aspect-[2/1] object-cover"/>
                            @else
                                <div class="w-full aspect-[2/1] skeleton"></div>
                            @endif
                        </a>
                    </x-slot:figure>
                    <x-slot:menu>
                        <x-mary-button icon="o-share" class="btn-circle" />
                    </x-slot:menu>
                    <x-slot:actions separator>
                        <x-mary-button label="Baca Selengkapnya" class="btn-primary" :link="route('information.news-content', ['type' => 'news', 'slug' => $item->slug])"/>
                    </x-slot:actions>
                </x-mary-card>
            @endforeach
        @else
            <div class="flex-1 text-center">
                <h3 class="text-xl">Tidak ada berita</h3>
            </div>
        @endif
    </div>
    {{ $news->links(data: ['scrollTo' => '#news-content']) }}
</div>
