<div class="flex flex-col gap-5">
    {{ $news->links(data: ['scrollTo' => '#news-content']) }}
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
        @if ($news->count() > 0)
            @foreach ($newsChunks as $chunk)
                <div class="flex flex-col gap-5">
                    @foreach ($chunk as $item)
                        <div>
                            <x-mary-card :title="$item->title" class="border shadow-lg">
                                <div class="relative overflow-hidden max-h-56">
                                    <div class="absolute bottom-0 left-0 right-0 h-10 bg-gradient-to-t from-white to-transparent"></div>
                                    {{-- <a href="{{ route('information.news-content', ['type' => 'news', 'slug' => $item->slug]) }}" class="line-clamp-3">
                                        {!! Str::limit($item->content, 200) !!}
                                    </a> --}}
                                </div>
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
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="flex-1 text-center">
                <h3 class="text-xl">Tidak ada berita</h3>
            </div>
        @endif
    </div>
    {{ $news->links(data: ['scrollTo' => '#news-content']) }}
</div>
