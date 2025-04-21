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
                {{-- <button class="btn btn-square btn-ghost">
                    <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"><path d="M6 3L20 12 6 21 6 3z"></path></g></svg>
                </button>
                <button class="btn btn-square btn-ghost">
                    <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></g></svg>
                </button> --}}
            </li>
        @endforeach
    </ul>
</div>
