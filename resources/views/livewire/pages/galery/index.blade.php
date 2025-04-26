<x-container class="py-12">
    <x-header class="mb-8">
        Galeri Desa
    </x-header>
    
    <div class="grid grid-cols-2 gap-5 lg:grid-cols-3">
        @foreach ($imageChunks as $imageChunk)
            <div class="flex flex-col gap-5">
                @foreach ($imageChunk as $image)
                    <img src="{{ asset($image->url) }}" alt="{{ $image->alt }}" class="w-full h-auto transition rounded-lg shadow-lg hover:scale-105">
                @endforeach
            </div>
        @endforeach
    </div>
</x-contain>
 