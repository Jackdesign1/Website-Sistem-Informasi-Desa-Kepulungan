<x-container class="py-12">
    <div class="flex flex-col items-center justify-center gap-2 mb-12">
        <x-header>
            Galeri Desa
        </x-header>
        <span class="text-gray-500">Dokumentasi Kegiatan dan Keindahan Desa Kepulungan</span>
    </div>
    
    <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4">
        {{-- @foreach ($imageChunks as $imageChunk) --}}
            {{-- <div class="flex flex-col gap-5"> --}}
                @foreach ($images as $image)
                    <img loading="lazy" src="{{ asset($image->url) }}" alt="{{ $image->alt }}" class="object-cover w-full transition rounded-lg shadow-lg aspect-square hover:scale-105">
                @endforeach
            {{-- </div> --}}
        {{-- @endforeach --}}
    </div>
</x-container>
 