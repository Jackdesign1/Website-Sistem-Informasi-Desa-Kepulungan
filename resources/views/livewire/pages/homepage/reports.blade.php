<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($reports as $report)
        <div class="w-full text-gray-800 shadow-sm card rounded-xl bg-base-100">
            {{-- <figure>
                <img
                    src="{{ asset($report->media->first()->url) }}"
                    class="object-cover w-full aspect-square"
                    alt="berita1" />
            </figure> --}}
            <div class="card-body">
                <h2 class="text-2xl card-title">{{ $report->title }}</h2>
                <p>Update {{ $report->updated_at->format('d M Y') }}</p>
                <div class="justify-end card-actions">
                    <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya" :link="route('information.news-content', ['type' => 'report', 'slug' => $report->slug])"/>
                </div>
            </div>
        </div>
    @endforeach
</div>