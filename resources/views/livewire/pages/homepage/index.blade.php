

<div class="pb-20 space-y-40">
    <livewire:pages.homepage.hero-carousel />

    <x-village-profile.speech />
    <x-village-profile.profile />

    <x-container>
        <x-header class="mb-7">Aparatur Desa</x-header>
        <livewire:pages.homepage.apparatuses />
    </x-container>

    <x-container>
        <x-header class="mb-7">Anggaran Desa</x-header>
        <div class="flex items-center justify-between mb-5">
            <x-mary-select class="mb-5" :options="$years" option-label="label" option-value="year" wire:model.live='selectedYear' label="Pilih Tahun Anggaran" placeholder="Pilih Tahun" icon="o-calendar"></x-mary-select>
            <x-mary-button label="Baca Anggaran Desa" class="btn btn-success" :link="route('budget')"/>
        </div>
        <livewire:pages.budget.budget :year="$selectedYear" withChart="false" wire:key='{{ $selectedYear }}' lazy/>
    </x-container>

    <x-container x-data='{hideItem: true}'>
        <x-header class="mb-7">Layanan</x-header>
        <div class="relative flex flex-wrap w-full gap-5 mb-5 overflow-hidden transition-all carousel-item md:max-h-screen" :class="hideItem? 'max-h-[39rem]' : 'max-h-screen'" x-cloak>
            <x-mary-card title="Berita" subtitle="Informasi Berita Kegiatan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-72" separator>
                <a class="text-sm link link-hover link-secondary" href="{{ route('information.index')."?set=news#news-content" }}" wire:navigate>Baca Selengkapnya</a>
            </x-mary-card>
            <x-mary-card title="Informasi" subtitle="Informasi Kegiatan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-72" separator>
                <a class="text-sm link link-hover link-secondary" href="{{ route('information.index')."?set=news#news-content" }}" wire:navigate>Baca Selengkapnya</a>
            </x-mary-card>
            <x-mary-card title="Laporan" subtitle="Informasi Laporan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-72" separator>
                <a class="text-sm link link-hover link-secondary" href="{{ route('information.index')."?set=report#news-content" }}" wire:navigate>Baca Selengkapnya</a>
            </x-mary-card>
            <x-mary-card title="Layanan Informasi" subtitle="Informasi Berita Kegiatan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-72" separator />
            <x-mary-card title="Aspirasi" subtitle="Aspirasi Terhadap Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-72" separator />
            <x-mary-card title="Panduan" subtitle="Penduan Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-64" separator />
            <div class="absolute bottom-0 left-0 right-0 h-14 bg-gradient-to-t from-white to-transparent md:hidden"></div>
        </div>
        <div class="text-center md:hidden">
            <template x-if="hideItem">
                <x-mary-button class="btn btn-success" label="Lihat Semua Layanan" x-on:click="hideItem = false" />
            </template>
            <template x-if="!hideItem">
                <x-mary-button class="btn btn-outline" label="Sembunyikan Sebagian Layanan" x-on:click="hideItem = true" />
            </template>  </div>
    </x-container>

    <div class="bg-gradient-to-tr from-gray-300 to-gray-200">
        <x-container class="py-20">
            <x-header class="mb-8 text-center">Informasi</x-header>
            <x-mary-tabs wire:model="selectedTab" wire:init="selectedTab = 'news-tab'">
                <x-mary-tab name="news-tab" label="Berita" icon="forkawesome.newspaper-o">
                    <livewire:pages.homepage.news lazy />
                </x-mary-tab>

                <x-mary-tab name="reports-tab" label="Laporan" icon="tabler.report-analytics">
                    <livewire:pages.homepage.reports lazy />
                </x-mary-tab>

                {{-- <x-mary-tab name="jobs-tab" label="Jobs" icon="hugeicons.job-search">
                    <div>Jobs</div>
                </x-mary-tab> --}}
            </x-mary-tabs>
        </x-container>
    </div>

    {{-- <x-container>
        @php
            $events = [
                [
                    'label' => 'Day off',
                    'description' => 'Playing <u>tennis.</u>',
                    'css' => '!bg-amber-200',
                    'date' => now()->startOfMonth()->addDays(3),
                ],
                [
                    'label' => 'Event at same day',
                    'description' => 'Hey there!',
                    'css' => '!bg-amber-200',
                    'date' => now()->startOfMonth()->addDays(3),
                ],
                [
                    'label' => 'Laracon',
                    'description' => 'Let`s go!',
                    'css' => '!bg-blue-200',
                    'range' => [
                        now()->startOfMonth()->addDays(13),
                        now()->startOfMonth()->addDays(15)
                    ]
                ],
            ];
        @endphp


        <div class="flex items-center gap-8">
            <div>
                <x-header class="mb-8">Kalender Desa</x-header>
                <div class="flex-shrink border shadow-lg rounded-xl">
                    <x-mary-calendar :events="$events" class="w-full" months="2"/>
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
                <a href="" class="link link-primary link-hover">Lihat selengkapnya</a>
            </div>
        </div>
    </x-container> --}}

    <div class="bg-gradient-to-tr from-red-600 to-red-400">
        <x-container class="py-20">
            <x-header class="mb-8 text-center text-white">Badan Usaha Milik Desa</x-header>
            <x-carousel class="h-[500px] lg:h-[600px] rounded-2xl overflow-hidden shadow-lg">
                {{-- @for ($i = 1; $i <= 4; $i++) --}}
                    <div id="bumdes" class="relative w-full carousel-item">
                        <img
                            src="{{ asset('assets/images/badan-usaha-milik-desa.png') }}"
                            class="object-cover w-full" />
                        <x-container class="absolute top-0 bottom-0 z-20 left-5 right-5">
                            {{-- <x-carousel-nav index="1" name="bumdes"></x-carousel-nav> --}}
                            <div class="absolute space-y-3 text-center text-white translate-y-1/2 bottom-1/2 md:bottom-20 md:translate-y-0 md:left-14 lg:left-24 md:text-left lg:w-1/2">
                                <x-header class="text-2xl md:text-3xl">
                                    Bupati Pasuruan Resmikan Wisata Air Panas Kepulungan 
                                </x-header>
                                <div class="text-base md:text-xl">
                                    Wisata Pemandian Air Panas Langsung <br>
                                    Dari Sumbernya yang Sangat Menyejukkan Badan
                                </div>
                                <x-mary-button label="Kunjungi Website" class="btn-success"/>
                            </div>
                        </x-container>
                    </div>
                {{-- @endfor --}}
            </x-carousel>
        </x-container>
    </div>

    <x-container>
        <div class="flex items-center justify-between mb-8">
            <x-header>Galeri Desa</x-header>
            <x-mary-button class="btn-success" label="Lihat Galeri" :link="route('galery')" />
        </div>
        {{-- galery --}}
        <div class="grid grid-cols-2 gap-3 min-h-96">
            <div class="flex flex-col min-h-0 gap-3">
                <div class="rounded-xl overflow-hidden shadow-lg flex-[.8]">
                    <img src="{{ asset('assets/images/badan-usaha-milik-desa.png') }}" alt="product-1.jpg" class="object-cover object-center w-full h-full transition duration-300 hover:scale-110">
                </div>
                <div class="flex-1 overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('assets/images/Galeri_1.jpg') }}" alt="product-1.jpg" class="object-cover object-center w-full h-full transition duration-300 hover:scale-110">
                </div>
            </div>
            <div class="flex flex-col min-h-0 gap-3">
                <div class="rounded-xl overflow-hidden shadow-lg flex-[1.8]">
                    <img src="{{ asset('assets/images/Galeri_2.jpg') }}" alt="product-1.jpg" class="object-cover object-center w-full h-full transition duration-300 hover:scale-110">
                </div>
                <div class="flex-1 overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('assets/images/Galeri_3.jpg') }}" alt="product-1.jpg" class="object-cover object-center w-full h-full transition duration-300 hover:scale-110">
                </div>
            </div>
        </div>
    </x-container>
</div>
