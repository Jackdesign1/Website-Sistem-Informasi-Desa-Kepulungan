<x-carousel class="h-[45dvh] md:h-[500px] lg:h-[600px]">
    {{-- @for ($i = 1; $i <= 4; $i++) --}}
        <div id="slide" class="relative w-full carousel-item">
            <img
                src="/assets/images/hero-image.png"
                class="object-cover w-full" />
            <x-container class="absolute top-0 bottom-0 z-20 left-5 right-5">
                {{-- <x-carousel-nav name="slide" :index="$i"></x-carousel-nav> --}}
                <div class="absolute text-lg text-center text-white md:text-4xl bottom-24 max-w-96 lg:left-20 md:text-left">
                    Bupati Pasuruan Resmikan Wisata Air Panas Kepulungan
                </div>
            </x-container>
        </div>
    {{-- @endfor --}}
</x-carousel>