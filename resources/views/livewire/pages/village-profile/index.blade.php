<div class="py-20 space-y-40">
    <x-container class="flex items-center gap-16">
        <div class="flex-1 space-y-4">
            <x-header>Sejarah Desa Kapulungan</x-header>
            <p>Desa Kepulungan berlokasi di Kecamatan Gempol, Kabupaten Pasuruan, Provinsi Jawa Timur, dulunya dikenal sebagai pintu gerbang menuju Gunung Pawitra, sebuah wilayah yang pernah menjadi bagian dari Kerajaan Negeri Aryapada pada masa Hindu-Buddha sekitar abad ke-10 hingga 13. Banyak prasasti yang ditemukan di Desa Kepulungan menjadi bukti bahwa desa ini memiliki peran penting sebagai pusat kegiatan keagamaan dan administratif pada masa itu, dengan peninggalan berupa situs-situs kuno dan benda-benda arkeologi yang menggambarkan kehidupan masyarakat yang kental dengan budaya Hindu. Seiring berjalannya waktu, Desa Kepulungan berkembang menjadi pemukiman agraris yang memanfaatkan kesuburan tanah di sekitar Gunung Pawitra, sambil tetap melestarikan jejak sejarahnya sebagai bagian dari warisan budaya Pasuruan.</p>
        </div>
        <div class="flex-[.8]">
            <img src="{{ asset('assets/images/profil-desa.png') }}" alt="" class="object-cover w-full h-full shadow-lg rounded-xl aspect-video">
        </div>
    </x-container>

    <x-container class="flex items-center gap-16">
        <div class="flex-shrink">
            <img src="{{ asset('assets/images/Pak_Didik.png') }}" alt="" class="object-cover w-full h-full shadow-lg rounded-xl aspect-square max-w-96">
        </div>
        <div class="flex-1">
            <x-header>Kepala Desa Kepulungan Periode 2020-2025</x-header>
            <h4 class="text-2xl font-semibold">Didik Hartono S.H.,M.H</h4>
            <p class="mt-4"><span class="font-semibold">Assalamualaikum Wr. Wb.</span> <br> selamat datang di website resmi Pemerintah Desa Kepulungan. Dengan rasa syukur kepada Allah SWT, kami hadirkan platform ini sebagai wujud komitmen untuk transparansi dan kemudahan akses informasi. Di tengah pesatnya teknologi, website ini menjadi sarana menyampaikan perkembangan, kegiatan, dan capaian pembangunan desa secara faktual dan real-time, mengundang seluruh masyarakat desa kepulungan untuk memanfaatkannya demi kemajuan bersama. Penghargaan setinggi-tingginya serta terima kasih kami sampaikan kepada Tim Dosen dan Mahasiswa Program Studi Teknik Informatika PSDKU Sidoarjo Politeknik Negeri Jember yang telah membantu mewujudkan Website Pemerintah desa Kepulungan.</p>
        </div>
    </x-container>

    <div>
        <!-- Header -->
        <div class="py-10 text-center bg-gray-200 mb-7">
            <x-header>Visi & Misi</x-header>
        </div>

        <x-container class="flex items-center justify-center rounded-full text-end">
            <!-- Visi Section -->
            <div class="w-1/3 px-5">
                <h4 class="text-xl font-semibold">Visi</h4>
                <p>Terwujudnya Desa Kepulungan yang maju, mandiri, damai dan sejahtera,
                    melalui tata kelola pemerintahan yang baik dan berkualitas</p>
            </div>

            <div class="h-40 border-r-4"></div>

            <!-- Misi Section -->
            <div class="w-1/3 p-5 text-start md:text-start">
                <h4 class="text-xl font-semibold">Misi</h4>
                <p>meningkatkan pengolahan dan penggalian potensi sumber daya desa guna mendongkrak pendapatan masyarakat dan desa, sekaligus memperkuat ketahanan pangan serta sektor perekonomian desa melalui pembangunan yang berkelanjutan.</p>
            </div>
        </x-container>
    </div>

    {{-- <x-container>
        <x-header class="mb-8">
            Program Desa
        </x-header>

        @php
            $headers = [
                ['key' => 'id', 'label' => '#'],
                ['key' => 'name', 'label' => 'Nama Program'],
                ['key' => 'anggaran', 'label' => 'Anggaran'],
                ['key' => 'realisasi', 'label' => 'Realisasi'],
                ['key' => 'status_program', 'label' => 'Status Program'],
                ['key' => 'dokumen', 'label' => 'Dokumen'],
            ];

            $rows = [
                ['id' => 1, 'name' => 'Program 1', 'anggaran' => "Rp 12.000,000", "realisasi" => 'lorem ipsum dolorem', 'status_program' => 'Berjalan', 'dokumen' => 'www.google.com'],
                ['id' => 1, 'name' => 'Program 1', 'anggaran' => "Rp 12.000,000", "realisasi" => 'lorem ipsum dolorem', 'status_program' => 'Berjalan', 'dokumen' => 'www.facebook.com'],
                ['id' => 1, 'name' => 'Program 1', 'anggaran' => "Rp 12.000,000", "realisasi" => 'lorem ipsum dolorem', 'status_program' => 'Berjalan', 'dokumen' => 'www.youtube.com'],
                ['id' => 1, 'name' => 'Program 1', 'anggaran' => "Rp 12.000,000", "realisasi" => 'lorem ipsum dolorem', 'status_program' => 'Berjalan', 'dokumen' => 'www.google.com'],
                ['id' => 1, 'name' => 'Program 1', 'anggaran' => "Rp 12.000,000", "realisasi" => 'lorem ipsum dolorem', 'status_program' => 'Berjalan', 'dokumen' => 'www.google.com'],
                ['id' => 1, 'name' => 'Program 1', 'anggaran' => "Rp 12.000,000", "realisasi" => 'lorem ipsum dolorem', 'status_program' => 'Berjalan', 'dokumen' => 'www.google.com'],
                ['id' => 1, 'name' => 'Program 1', 'anggaran' => "Rp 12.000,000", "realisasi" => 'lorem ipsum dolorem', 'status_program' => 'Berjalan', 'dokumen' => 'www.google.com'],
            ]
        @endphp

        <x-mary-table :headers="$headers" :rows="$rows">
            @scope('cell_dokumen', $row)
                <a href="http://{{ $row['dokumen'] }}" class="link link-hover link-primary">Unduh</a>
            @endscope
        </x-mary-table>
    </x-container> --}}

    <x-container>
        <x-header class="mb-8">
            Struktur Desa Kepulungan
        </x-header>

        {{-- <img src="{{ asset('assets/images/struktur-desa.png') }}" alt="struktur-desa.png" class="w-full h-auto max-w-3xl mx-auto"> --}}
    </x-container>

    {{-- <x-container>
        <x-header class="mb-8">
            Kalender Desa
        </x-header>

        @livewire('pages.village-profile.calendar')
    </x-container> --}}

    <x-container>
        <x-header class="mb-8">
            Peta Lokasi Desa
        </x-header>
        <div class="grid grid-cols-2 gap-8">
            <div class="flex flex-col flex-1 gap-3 p-5 border shadow-lg rounded-xl">
                <div>
                    <span class="font-semibold">Batas Desa</span>
                    <div class="grid grid-cols-2 gap-3 p-3 text-sm">
                        <div>
                            Utara <br>
                            Desa Santan Ulu dan Desa Santan Ilir
                        </div>
                        <div>
                            Timur <br>
                            Selat Makasar
                        </div>
                        <div>
                            Selatan <br>
                            Selat Makassar dan Desa Semangko
                        </div>
                        <div>
                            Barat <br>
                            Desa Santan Ulu
                        </div>
                    </div>
                </div>
                <hr>
                <div class="grid grid-cols-2 gap-3">
                    <span class="font-semibold">Luas Desa</span>
                    <span class="text-sm">421.000 ㎡</span>
                </div>
                <hr>
                <div class="grid grid-cols-2 gap-3">
                    <span class="font-semibold">Jumlah Penduduk</span>
                    <span class="text-sm">1.153 Jiwa</span>
                </div>
            </div>
            <div class="flex-1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15818.430405709454!2d112.68085475173436!3d-7.617604609921907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d914ac6521cb%3A0x754dace6af13cc1a!2sKepulungan%2C%20Kec.%20Gempol%2C%20Pasuruan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1744819670153!5m2!1sid!2sid" class="w-full aspect-[16/8] rounded-xl shadow-lg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </x-container>
</div>

