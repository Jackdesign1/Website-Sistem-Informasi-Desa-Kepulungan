

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
            <img src="{{ asset('assets/images/Pak_Didik.png') }}" alt="" class="object-cover w-full h-full shadow-lg rounded-xl aspect-square max-w-96">
        </div>
        <div class="flex-1">
            <x-header>Sambutan Kepala Desa</x-header>
            <h4 class="text-2xl font-semibold">Didik Hartono S.H.,M.H</h4>
            <p class="mt-4"><span class="font-semibold">Assalamualaikum Wr. Wb.</span>
                <br> selamat datang di website resmi Pemerintah Desa Kepulungan. Dengan rasa syukur kepada Allah SWT, kami hadirkan platform ini sebagai wujud komitmen untuk transparansi dan kemudahan akses informasi. Di tengah pesatnya teknologi, website ini menjadi sarana menyampaikan perkembangan, kegiatan, dan capaian pembangunan desa secara faktual dan real-time, mengundang seluruh masyarakat desa kepulungan untuk memanfaatkannya demi kemajuan bersama. Penghargaan setinggi-tingginya serta terima kasih kami sampaikan kepada Tim Dosen dan Mahasiswa Program Studi Teknik Informatika PSDKU Sidoarjo Politeknik Negeri Jember yang telah membantu mewujudkan Website Pemerintah desa Kepulungan.
            </p>
        </div>
    </x-container>

    <x-container class="flex items-center gap-16">
        <div class="flex-1 space-y-4">
            <x-header>Profil Desa Kapulungan</x-header>
            <p>Desa Kepulungan berlokasi di Kecamatan Gempol, Kabupaten Pasuruan, Provinsi Jawa Timur, dulunya dikenal sebagai pintu gerbang menuju Gunung Pawitra, sebuah wilayah yang pernah menjadi bagian dari Kerajaan Negeri Aryapada pada masa Hindu-Buddha sekitar abad ke-10 hingga 13. Banyak prasasti yang ditemukan di Desa Kepulungan menjadi bukti bahwa desa ini memiliki peran penting sebagai pusat kegiatan keagamaan dan administratif pada masa itu, dengan peninggalan berupa situs-situs kuno dan benda-benda arkeologi yang menggambarkan kehidupan masyarakat yang kental dengan budaya Hindu. Seiring berjalannya waktu, Desa Kepulungan berkembang menjadi pemukiman agraris yang memanfaatkan kesuburan tanah di sekitar Gunung Pawitra, sambil tetap melestarikan jejak sejarahnya sebagai bagian dari warisan budaya Pasuruan.</p>
            <x-mary-button class="btn btn-success" link="profil-desa"  label="Lebih Detail"/>
        </div>
        <div class="flex-[.8]">
            <img src="{{ asset('assets/images/Foto_Desa.jpg') }}" alt="" class="object-cover w-full h-full shadow-lg rounded-xl aspect-video">
        </div>
    </x-container>

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


    <x-container>

                <div class="container mx-auto px-6">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <!-- Logo and Title -->
                        <div class="flex items-center mb-4 md:mb-0">
                            <div class="">
                                <img src="{{ asset('assets/images/logo-desa-kapulungan.png
') }}">
                            </div>
                            <div>
                                <h1 class="text-lg font-bold text-gray-800">Pemerintah Desa Kepulungan</h1>
                                <p class="text-xs text-gray-600">Kabupaten Pasuruan</p>
                            </div>
                        </div>
                        <!-- Contact Info -->
                        <div class="text-right">
                            <p class="text-xs text-gray-600">Kantor Desa Kepulungan</p>
                            <p class="text-xs text-gray-600">Kepulungan - Gempol jl. surabaya malang, </p>
                            <p class="text-xs text-gray-600">Kabupaten Pasuruan, Jawa Timur 67155, Indonesia.</p>
                            <div class="flex justify-end space-x-2 mt-1">
                                <a href="#" class="text-[#003087]"><i class="fab fa-facebook-f text-xs"></i></a>
                                <a href="#" class="text-[#003087]"><i class="fab fa-youtube text-xs"></i></a>
                                <a href="#" class="text-[#003087]"><i class="fab fa-instagram text-xs"></i></a>
                                <a href="#" class="text-[#003087]"><i class="fab fa-linkedin-in text-xs"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-6 text-xs">
                        <!-- Tentang -->
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Lorem</h3>
                            <ul class="space-y-0.5">
                                <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>

                            </ul>
                        </div>
                        <!-- Fasilitas -->
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Lorem</h3>
                            <ul class="space-y-0.5">
                                <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>
                                </ul>
                        </div>
                        <!-- Layanan -->
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Lorem</h3>
                            <ul class="space-y-0.5">
                                <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>

                            </ul>
                        </div>
                        <!-- Informasi Umum -->
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Lorem</h3>
                            <ul class="space-y-0.5">
                                <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </header>

            <footer class="bg-white py-2 mt-4 border-t border-gray-200">
                <div class="container mx-auto px-6 text-center">
                    <p class="text-gray-600 text-xs">Program Studi Teknik Informatika PSDKU Sidoarjo</p>
                    <p class="text-gray-600 text-xs">Politeknik Negeri Jember © Copyright 2025</p>
                </div>
            </footer>


    </x-container>

</div>
