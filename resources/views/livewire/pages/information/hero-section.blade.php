<div class="bg-gray-200 lg:h-[600px] flex items-center py-8">
    <x-container class="w-full">
        <div id="hero-carousel" x-init="$('#hero-carousel').slick()">
            @foreach ($news as $newsIndex => $items)
                @foreach ($items as $index => $item)
                    <div class="flex flex-col justify-center left-5 right-5">
                        <div class="lg:ps-10 pb-2">
                            <h2 class="text-4xl text-center lg:text-start font-bold">{{ $item->type == "news"? 'Berita' : 'Laporan' }}</h2>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                            <div class="w-full lg:ps-10">
                                <img src="{{ $item->media->first()->url }}" alt="{{ $item->media->first()->name }}" class="mx-auto lg:mx-0 object-cover w-full max-w-xl rounded-2xl shadow-xl aspect-[4/3]">
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-center lg:text-left">
                                    <p>{{ $item->created_at->format('d F Y') }}</p>
                                    <h2 class="text-3xl font-semibold">{{ $item->title }}</h2>
                                    <div class="text-gray-700 line-clamp-3">
                                        {!! truncateHTML($item->content, 300) !!}
                                    </div>
                                    <x-mary-button label="Baca Selengkapnya!" class="mt-3 btn-success" :link="route('information.news-content', ['type' => $newsIndex == 0? 'news' : 'report', 'slug' => $item->slug])"></x-mary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </x-container>
</div>

{{-- @pushOnce('scripts')
    @script
        <script>
            $('#hero-carousel').slick()
        </script>
    @endscript
@endPushOnce --}}