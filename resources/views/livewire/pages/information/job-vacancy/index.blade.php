<div>
    <ul class="gap-3 rounded-lg list">
        @foreach ($job_vacancies as $jobs)
            <li class="border shadow-lg list-row" x-data="{showMore: false}">
                <div><img class="size-10 rounded-box" src="{{ asset('assets/icons/blank-user-profile.png') }}"/></div>
                <div>
                    <div>{{ $jobs->company_name }}</div>
                    <div class="text-sm font-semibold capitalize opacity-60">Open For <span class="font-semibold">{{ $jobs->position }}</span></div>
                </div>
                <div class="list-col-wrap pb-1.5">
                    <div class="mb-1 font-semibold capitalize">{{ $jobs->title }}</div>
                    <div class="text-sm" :class="!showMore? 'line-clamp-3' : ''">
                        {{ $jobs->description }}
                    </div>
                </div>
                <div class="flex items-end text-end list-col-wrap">
                    <x-mary-button x-text="!showMore? 'Show More' : 'Show Less'" @click="showMore = !showMore" class="btn-sm btn-ghost" />
                </div>
            </li>
        @endforeach
    </ul>
</div>
