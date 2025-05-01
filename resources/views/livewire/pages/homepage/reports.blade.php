<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @if($reports->count() > 0)
        @foreach ($reports as $report)
            <div class="w-full text-gray-800 shadow-sm card rounded-xl bg-base-100">
                <div class="card-body">
                    <h2 class="text-2xl card-title">{{ $report->title }}</h2>
                    <p>Update {{ $report->updated_at->format('d M Y') }}</p>
                    <div class="justify-end card-actions">
                        <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya" :link="route('information.news-content', ['type' => 'report', 'slug' => $report->slug])"/>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="flex items-center justify-center w-full h-full">
            <x-mary-card title="Laporan" subtitle="Belum ada Laporan yang ditampilkan" class="w-full max-w-sm" />
        </div>
    @endif
</div>