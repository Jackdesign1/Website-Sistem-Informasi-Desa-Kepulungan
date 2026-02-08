@if ($news->isNotEmpty() && $reports->isNotEmpty())
    <div class="bg-gray-200 lg:h-[600px] flex items-center py-8">
        <x-container class="w-full" wire:cloak>
            <div id="hero-carousel" x-init="$('#hero-carousel').slick()">
                @foreach ([$news, $reports] as $newsIndex => $items)
                    @foreach ($items as $index => $item)
                        <div class="flex flex-col justify-center left-5 right-5">
                            <div class="pb-2 lg:ps-10">
                                <h2 class="text-4xl font-bold text-center lg:text-start">{{ $item->type == "news"? 'Berita' : 'Laporan' }}</h2>
                            </div>
                            <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">
                                <div class="w-full lg:ps-10">
                                    <img src="{{ $item->media->first()->url }}" alt="{{ $item->media->first()->name }}" class="mx-auto lg:mx-0 object-cover w-full max-w-xl rounded-2xl shadow-xl aspect-[4/3]">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <div class="text-center lg:text-left">
                                        <span>{{ $item->created_at->diffForHumans() }}</span>
                                        <h3 class="mb-3 text-3xl font-semibold">{{ $item->title }}</h3>
                                        <div class="relative overflow-hidden text-gray-700 line-clamp-3 max-h-56">
                                            {{-- <div class="absolute bottom-0 left-0 right-0 z-20 h-12 bg-gradient-to-t from-gray-200 to-transparent"></div> --}}
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
@endif

{{-- @pushOnce('scripts')
    @script
        <script>
            $('#hero-carousel').slick()
        </script>
    @endscript
@endPushOnce --}}