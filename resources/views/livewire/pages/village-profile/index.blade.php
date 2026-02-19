<div class="py-20 space-y-40">
    <x-container>
        <x-village-profile.profile />
    </x-container>

    <x-container>
        <x-village-profile.speech />
    </x-container>

    <div>
        <!-- Header -->
        <div class="py-10 text-center bg-gray-200 mb-7">
            <x-header>Visi & Misi</x-header>
        </div>

        <x-container class="flex flex-col items-center justify-center text-center rounded-full md:flex-row md:items-start">
            <!-- Visi Section -->
            <div class="flex-1 p-5 max-w-96 md:text-end">
                <h4 class="text-xl font-semibold">Visi</h4>
                <p>Terwujudnya Desa Kepulungan yang maju, mandiri, damai dan sejahtera,
                    melalui tata kelola pemerintahan yang baik dan berkualitas</p>
            </div>

            <!-- Misi Section -->
            <div class="flex-1 p-5 border-t-4 border-gray-200 md:border-t-0 md:border-l-4 max-w-96 md:text-start">
                <h4 class="text-xl font-semibold">Misi</h4>
                <p>meningkatkan pengolahan dan penggalian potensi sumber daya desa guna mendongkrak pendapatan masyarakat dan desa, sekaligus memperkuat ketahanan pangan serta sektor perekonomian desa melalui pembangunan yang berkelanjutan.</p>
            </div>
        </x-container>
    </div>

    <x-container>
        <livewire:pages.village-profile.village-program>
    </x-container>

    <x-container>
        <x-header class="mb-8">
            Struktur Desa Kepulungan
        </x-header>

        <img src="{{ asset('assets/images/bagan-organisasi.png') }}" alt="struktur-desa.png" class="w-full h-auto max-w-4xl mx-auto">
    </x-container>

    <x-container id="village-calendar">
        <x-header class="mb-8">
            Kalender Desa
        </x-header>

        @livewire('pages.village-profile.calendar')
    </x-container>

    <x-container>
        <x-header class="mb-8">
            Peta Lokasi Desa
        </x-header>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <div class="flex flex-col flex-1 gap-3 p-5 border shadow-lg rounded-xl">
                <div>
                    <span class="font-semibold">Batas Desa</span>
                    <div class="grid grid-cols-2 gap-3 p-3 text-sm">
                        <div>
                            Utara <br>
                            Desa Ngerong, Kecamatan Gempol
                        </div>
                        <div>
                            Timur <br>
                            Desa Randupitu, Kecamatan Gempol
                        </div>
                        <div>
                            Selatan <br>
                            Desa Wonosari, Kecamatan Gempol
                        </div>
                        <div>
                            Barat <br>
                            Desa Sumberejo, Kecamatan Pandaan
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

