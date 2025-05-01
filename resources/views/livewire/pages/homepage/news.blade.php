<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @if ($news->count() > 0)
        @foreach ($news as $item)
            <div class="w-full shadow-sm card rounded-xl bg-base-100 image-full">
                <figure>
                    <img
                        src="{{ asset($item->media->first()->url) }}"
                        class="object-cover w-full aspect-square"
                        alt="berita1" />
                </figure>
                <div class="card-body">
                    <h2 class="text-2xl card-title">{{ $item->title }}</h2>
                    <p>Update {{ $item->updated_at->format('d M Y') }}</p>
                    <div class="justify-end card-actions">
                        <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya" :link="route('information.news-content', ['type' => 'news', 'slug' => $item->slug])"/>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="flex items-center justify-center w-full h-full">
            <x-mary-card title="Berita" subtitle="Belum ada berita yang ditampilkan" class="w-full max-w-sm" />
        </div>
    @endif
</div>