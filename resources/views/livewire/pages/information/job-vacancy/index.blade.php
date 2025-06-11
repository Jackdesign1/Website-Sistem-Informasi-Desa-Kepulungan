<div>
    <ul class="gap-3 rounded-lg list">
        @foreach ($job_vacancies as $jobs)
            <li class="relative border shadow-lg list-row" x-data="{showMore: false}">
                <div><img class="size-10 rounded-box" src="{{ asset($jobs->company_logo) }}"/></div>
                <div>
                    <div>{{ $jobs->company_name }}</div>
                    <div class="text-sm font-semibold capitalize opacity-60">Posisi: <span class="font-semibold">{{ $jobs->position }}</span></div>
                    <div class="text-sm font-semibold capitalize opacity-60">Batas Akhir Lowongan: <span class="font-semibold">{{ $jobs->expires_at? date('d M Y', strtotime($jobs->expires_at)) : '-' }}</span></div>
                </div>
                <div class="list-col-wrap pb-1.5">
                    <div class="mb-1 text-xl font-semibold capitalize">{{ $jobs->title }}</div>
                </div>
                <div class="flex items-end text-end list-col-wrap">
                    {{-- <x-mary-button x-text="!showMore? 'Show More' : 'Show Less'" @click="showMore = !showMore" class="btn-sm btn-ghost" /> --}}
                    <x-mary-button :label="$jobs->status == 'open'? 'Open' : 'Closed'" class="{{ $jobs->status == 'open'? 'btn-success' : '' }} capitalize"/>
                </div>
            </li>
        @endforeach
    </ul>
</div>
