

<div id="hero-image" x-cloak>
    @forelse ($heroImages as $heroImage)
        <div class="relative overflow-hidden border shadow-xl">
            <div class="absolute top-0 bottom-0 left-0 right-0 z-10 bg-black/40"></div>
            <img
                src="{{ asset($heroImage->image) }}"
                class="object-cover w-full h-[45dvh] md:h-[500px] lg:h-[600px]" />
            <div class="absolute top-0 bottom-0 z-20 flex justify-center left-5 right-5">
                <div class="absolute text-center text-white max-w-96 lg:left-20 lg:text-left bottom-16 md:bottom-24">
                    <p class="font-semibold mb-1.5 text-lg md:text-4xl lg:text-5xl">{{ $heroImage->title }}</p>
                    <p class="lg:text-xl">{{ $heroImage->subtitle }}</p>
                    @if ($heroImage->button_text && $heroImage->button_url)
                        <x-mary-button class="mt-3 btn-primary" :label="$heroImage->button_text" external :link="$heroImage->button_url"/>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="bg-gray-200 h-[45dvh] md:h-[500px] lg:h-[600px] grid rounded-lg shadow-lg place-content-center place-items-center">
            <p class="text-gray-500">Tidak ada gambar tersedia</p>
        </div>
    @endforelse
</div>

@script
    <script>
        $('#hero-image').slick({
            autoplay: true,
            dots: true,
            autoplaySpeed: 5000,
            adaptiveHeight: true,
            speed: 1000,
        })
    </script>
@endscript
