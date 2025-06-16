<x-container class="w-full">
    <div id="hero-carousel" wire:cloak>
        @foreach ($news as $newsIndex => $items)
            @foreach ($items as $index => $item)
                <div class="flex flex-col justify-center left-5 right-5">
                    <div class="pb-2 lg:ps-10">
                        <h2 class="text-4xl font-bold text-center lg:text-start">{{ $item->type == "news"? 'Berita' : 'Laporan' }}</h2>
                    </div>
                    <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">
                        <div class="w-full lg:ps-10">
                            <a wire:navigate href="{{ route('information.news-content', ['type' => $newsIndex == 0? 'news' : 'report', 'slug' => $item->slug]) }}">
                                <img src="{{ $item->media->first()->url }}" alt="{{ $item->media->first()->name }}" class="mx-auto lg:mx-0 object-cover w-full max-w-xl rounded-2xl shadow-xl aspect-[4/3]">
                            </a>
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="text-center lg:text-left">
                                <p>{{ $item->created_at->format('d F Y') }}</p>
                                <h2 class="text-3xl font-semibold">
                                    <a wire:navigate href="{{ route('information.news-content', ['type' => $newsIndex == 0? 'news' : 'report', 'slug' => $item->slug]) }}">
                                        {{ $item->title }}
                                    </a>
                                </h2>
                                <div class="text-gray-700 line-clamp-3">
                                    <a wire:navigate href="{{ route('information.news-content', ['type' => $newsIndex == 0? 'news' : 'report', 'slug' => $item->slug]) }}">
                                        {!! truncateHTML($item->content, 300) !!}
                                    </a>
                                </div>
                                <a wire:navigate class="inline-block mt-3 font-semibold text-primary" href="{{ route('information.news-content', ['type' => $newsIndex == 0? 'news' : 'report', 'slug' => $item->slug]) }}">Baca Selengkapnya <x-mary-icon name="tabler.arrow-right" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</x-container>

@script
    <script>
        $('#hero-carousel').slick({
            autoplay: true,
            dots: true
        })
        document.addEventListener('livewire:navigating', () => {
            $('#hero-carousel').slick('unslick')
        })
    </script>
@endscript