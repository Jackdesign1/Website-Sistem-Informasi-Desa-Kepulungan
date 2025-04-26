<div class="pb-20 space-y-40">
    <x-carousel class="h-96 md:h-[500px] lg:h-[600px]">
        @for ($i = 1; $i <= 4; $i++)
            <div id="slide{{ $i }}" class="relative w-full carousel-item">
                <img
                    src="/assets/images/hero-image.png"
                    class="object-cover w-full" />
                <x-container class="absolute top-0 bottom-0 z-20 left-5 right-5">
                    <x-carousel-nav name="slide" :index="$i"></x-carousel-nav>
                    <div class="absolute text-white md:text-4xl bottom-24 max-w-96 left-20">
                        Bupati Pasuruan Resmikan Wisata Air Panas Kepulungan {{ $i }}
                    </div>
                </x-container>
            </div>
        @endfor
    </x-carousel>

    <x-container class="flex items-center gap-16">
        <div class="flex-shrink">
            <img src="{{ asset('assets/images/kepala-desa.png') }}" alt="" class="object-cover w-full h-full shadow-lg rounded-xl aspect-square max-w-96">
        </div>
        <div class="flex-1">
            <x-header>Sambutan Kepala Desa</x-header>
            <h4 class="text-2xl font-semibold">Muhammad Zaky S.H.,M.H</h4>
            <p class="mt-4"><span class="font-semibold">Assalamualaikum Wr. Wb.</span> <br> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint </p>
        </div>
    </x-container>

    <x-container class="flex items-center gap-16">
        <div class="flex-1 space-y-4">
            <x-header>Profil Desa Kapulungan</x-header>
            <p>incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
            <x-mary-button class="btn btn-success" link="profil-desa"  label="Lebih Detail"/>
        </div>
        <div class="flex-[.8]">
            <img src="{{ asset('assets/images/profil-desa.png') }}" alt="" class="object-cover w-full h-full shadow-lg rounded-xl aspect-video">
        </div>
    </x-container>

    <x-container>
        <x-header class="mb-7">Aparatur Desa</x-header>
        <div class="w-full gap-5 carousel">
            @for ($i = 0; $i < 8; $i++)
                <div class="carousel-item">
                    <x-mary-card title="Muhammad Zaky S.H.,M.H" class="!max-w-60 border !shadow-lg rounded-xl">
                        <div>
                            <div>Kepala Desa</div>
                            <div>NIPD: 123172312641237</div>
                        </div>
                        <x-slot:figure>
                            <img src="{{ asset('assets/images/kepala-desa.png') }}" class="aspect-square"/>
                        </x-slot:figure>
                    </x-mary-card>
                </div>
            @endfor
        </div>
    </x-container>

    <x-container>
        <x-header class="mb-7">Anggaran Desa</x-header>
        <div class="flex items-center justify-between mb-5">
            <x-mary-datetime/>
            <x-mary-button label="Baca Anggaran Desa" class="btn btn-success" :link="route('budget')"/>
        </div>
        <div class="w-full border shadow-lg stats rounded-xl">
            <div class="stat">
                <div class="stat-figure text-dark">
                    <x-tabler-chart-arrows class="w-7 h-7"/>
                </div>
                <div class="stat-title">APBDes 2025 Pembelanjaan</div>
                <div class="stat-value text-dark">Rp1.000.500,300</div>
                <div class="stat-desc">21% more than previous</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-dark">
                    <x-tabler-file-text class="w-7 h-7"/>
                </div>
                <div class="stat-title">APBDes 2025 Pelaksanaan</div>
                <div class="stat-value text-dark">Rp1.000.500,300</div>
                <div class="stat-desc">21% more than previous</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-dark">
                    <x-iconpark-incomeone-o class="w-7 h-7"/>
                </div>
                <div class="stat-title">APBDes 2025 Pendapatan</div>
                <div class="stat-value text-dark">Rp1.000.500,300</div>
                <div class="stat-desc">21% more than previous</div>
            </div>
        </div>
    </x-container>

    <x-container>
        <x-header class="mb-7">Layanan</x-header>
        <div class="flex flex-wrap w-full gap-5 carousel-item">
            <x-mary-card title="Berita" subtitle="Informasi Berita Kegiatan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-64" separator>
                <a class="text-sm link link-hover link-secondary" href="{{ route('information.index')."?set=news#news-content" }}" wire:navigate>Baca Selengkapnya</a>
            </x-mary-card>
            <x-mary-card title="Informasi" subtitle="Informasi Berita Kegiatan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-64" separator>
                <a class="text-sm link link-hover link-secondary" href="{{ route('information.index')."?set=news#news-content" }}" wire:navigate>Baca Selengkapnya</a>
            </x-mary-card>
            <x-mary-card title="Laporan" subtitle="Informasi Berita Kegiatan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-64" separator>
                <a class="text-sm link link-hover link-secondary" href="{{ route('information.index')."?set=report#news-content" }}" wire:navigate>Baca Selengkapnya</a>
            </x-mary-card>
            <x-mary-card title="Layanan Informasi" subtitle="Informasi Berita Kegiatan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-64" separator>
                <a class="text-sm link link-hover link-secondary" href="#">Baca Selengkapnya</a>
            </x-mary-card>
            <x-mary-card title="Aspirasi" subtitle="Informasi Berita Kegiatan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-64" separator>
                <a class="text-sm link link-hover link-secondary" href="#">Baca Selengkapnya</a>
            </x-mary-card>
            <x-mary-card title="Panduan" subtitle="Informasi Berita Kegiatan Pemerintah Desa Kepulungan" class="flex-1 border shadow-lg rounded-xl min-w-64" separator>
                <a class="text-sm link link-hover link-secondary" href="#">Baca Selengkapnya</a>
            </x-mary-card>
        </div>
    </x-container>

    <div class="bg-gradient-to-tr from-gray-300 to-gray-200">
        <x-container class="py-20">
            <x-header class="mb-8 text-center">Informasi</x-header>
            <x-mary-tabs wire:model="selectedTab" wire:init="selectedTab = 'news-tab'">
                <x-mary-tab name="news-tab" label="Berita" icon="forkawesome.newspaper-o">
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="w-full shadow-sm card rounded-xl bg-base-100 image-full">
                            <figure>
                                <img
                                src="{{ asset('assets/images/berita1.png') }}"
                                class="object-cover w-full aspect-square"
                                alt="berita1" />
                            </figure>
                            <div class="card-body">
                                <h2 class="text-2xl card-title">Bupati Pasuruan Resmikan Wisata Wong Pulungan</h2>
                                <p>Update 26 Maret 2024</p>
                                <div class="justify-end card-actions">
                                <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya"/>
                                </div>
                            </div>
                        </div>
                        <div class="w-full shadow-sm card rounded-xl bg-base-100 image-full">
                            <figure>
                                <img
                                src="{{ asset('assets/images/berita2.png') }}"
                                class="object-cover w-full aspect-square"
                                alt="Shoes" />
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">Bupati Pasuruan Resmikan Wisata Wong Pulungan</h2>
                                <p>Update 26 Maret 2024</p>
                                <div class="justify-end card-actions">
                                <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya"/>
                                </div>
                            </div>
                        </div>
                        <div class="w-full shadow-sm card rounded-xl bg-base-100 image-full">
                            <figure>
                                <img
                                src="{{ asset('assets/images/berita3.png') }}"
                                class="object-cover w-full aspect-square"
                                alt="Shoes" />
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">Bupati Pasuruan Resmikan Wisata Wong Pulungan</h2>
                                <p>Update 26 Maret 2024</p>
                                <div class="justify-end card-actions">
                                <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-mary-tab>

                <x-mary-tab name="reports-tab" label="Laporan" icon="tabler.report-analytics">
                    <div>Laporan</div>
                </x-mary-tab>

                <x-mary-tab name="jobs-tab" label="Jobs" icon="hugeicons.job-search">
                    <div>Jobs</div>
                </x-mary-tab>
            </x-mary-tabs>
        </x-container>
    </div>

    <x-container>
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
    </x-container>

    <div class="bg-gradient-to-tr from-red-600 to-red-400">
        <x-container class="py-20">
            <x-header class="mb-8 text-center text-white">Badan Usaha Milik Desa</x-header>
            <x-carousel class="h-96 md:h-[500px] lg:h-[600px] rounded-2xl overflow-hidden shadow-lg">
                @for ($i = 1; $i <= 4; $i++)
                    <div id="bumdes{{ $i }}" class="relative w-full carousel-item">
                        <img
                            src="{{ asset('assets/images/badan-usaha-milik-desa.png') }}"
                            class="object-cover w-full" />
                        <x-container class="absolute top-0 bottom-0 z-20 left-5 right-5">
                            <x-carousel-nav :index="$i" name="bumdes"></x-carousel-nav>
                            <div class="absolute space-y-3 text-white bottom-20 left-24 lg:w-1/2">
                                <x-header>
                                    Bupati Pasuruan Resmikan Wisata Air Panas Kepulungan {{ $i }}
                                </x-header>
                                <div class="text-xl">
                                    Wisata Pemandian Air Panas Langsung <br>
                                    Dari Sumbernya yang Sangat Menyejukkan Badan
                                </div>
                                <x-mary-button label="Kunjungi Website" class="btn-success"/>
                            </div>
                        </x-container>
                    </div>
                @endfor
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
                    <img src="{{ asset('assets/images/badan-usaha-milik-desa.png') }}" alt="product-1.jpg" class="object-cover object-center w-full h-full transition duration-300 hover:scale-110">
                </div>
            </div>
            <div class="flex flex-col min-h-0 gap-3">
                <div class="rounded-xl overflow-hidden shadow-lg flex-[1.8]">
                    <img src="{{ asset('assets/images/badan-usaha-milik-desa.png') }}" alt="product-1.jpg" class="object-cover object-center w-full h-full transition duration-300 hover:scale-110">
                </div>
                <div class="flex-1 overflow-hidden shadow-lg rounded-xl">
                    <img src="{{ asset('assets/images/badan-usaha-milik-desa.png') }}" alt="product-1.jpg" class="object-cover object-center w-full h-full transition duration-300 hover:scale-110">
                </div>
            </div>
        </div>

    </x-container>
</div>
