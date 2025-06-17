<div class="flex items-center gap-8">
    {{-- @dump($events) --}}
    <div>
        <x-header class="mb-8">Kalender Desa</x-header>
        <div class="flex-shrink border shadow-lg rounded-xl">
            <x-mary-calendar :events="$events" class="w-full" months="2" locale="id-ID" weekend-highlight/>
        </div>
    </div>
    <div class="flex-1 text-center">
        @foreach ($events as $event)
            <ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical">
                <li>
                    <div class="timeline-middle">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="w-5 h-5">
                        <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                    </div>
                    <div class="mb-10 {{ $loop->iteration % 2 == 1? "timeline-start" : "timeline-end" }} {{ $loop->iteration % 2 == 1? "md:text-end" : "md:text-start" }}">
                        <time class="font-mono italic">{{ isset($event['date'])? $event['date']->format('d M Y') : $event['range'][0]->format('d M Y')." - ".$event['range'][1]->format('d M Y') }}</time>
                        <div class="text-lg font-black">{{ $event['label'] }}</div>
                            {{ $event['description'] }}
                        </div>
                    <hr />
                </li>
            </ul>
        @endforeach
        <a href="{{ route('village-profile') }}#village-calendar" wire:navigate class="link link-primary link-hover">Lihat selengkapnya</a>
    </div>
</div>
