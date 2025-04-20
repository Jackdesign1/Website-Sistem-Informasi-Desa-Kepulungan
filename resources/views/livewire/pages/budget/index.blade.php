<div class="py-20 space-y-40">
    <x-container class="flex items-center justify-between gap-8">
        <div class="flex-1">
            <div class="max-w-sm text-xl text-center ms-auto">
                <x-header class="mb-3">
                    Transparansi Anggaran <br>Desa Kepulungan
                </x-header>
                Komitmen Kami untuk Keterbukaan dan Akuntabilitas dalam Pengelolaan Anggaran    
            </div>
        </div>
        <div class="flex flex-[.8] ps-8">
            <img src="{{ asset('assets/icons/transparancy-budget.png') }}" alt="" class="w-60">
        </div>
    </x-container>

    <x-container>
        <div class="flex items-center gap-8">
            <div class="flex-[.75] text-center">
                <x-header class="mb-5 text-center">Anggaran Desa</x-header>
                <div class="flex justify-center">
                    <x-mary-chart wire:model="myChart" class="w-full max-w-xl"/>
                </div>
            </div>
            <div class="flex-1">
                <div class="w-5/6 mx-auto">
                    <x-mary-datetime class="w-40 mb-5"/>
                    <div class="w-full border shadow-lg stats rounded-xl stats-vertical">
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
                </div>
            </div>
        </div>
    </x-container>

    <x-container>
        <x-header class="mb-8 text-center">Pendapatan</x-header>
        <div class="flex gap-5">
            <x-mary-accordion class="flex-1 shadow-lg">
                <x-mary-collapse name="group1" open no-icon separator>
                    <x-slot:heading class="bg-blue-300">
                        <div class="flex items-center justify-between">
                            <span>Pendapatan Transfer</span>
                            <div class="flex items-center gap-3">
                                <span>Rp 400.000,000</span>
                                <x-mary-badge value="45%" class="badge-soft" />
                            </div>
                        </div>
                    </x-slot:heading>
                    <x-slot:content>
                        <ol class="px-5 text-start">
                            <li class="flex items-center justify-between py-1">
                                <span>Dana Pajak</span>
                                <span>Rp100.000,000</span>
                            </li>
                            <li class="flex items-center justify-between py-1">
                                <span>Bagi Hasil Pajak</span>
                                <span>Rp100.000,000</span>
                            </li>
                        </ol>
                    </x-slot:content>
                </x-mary-collapse>
                <x-mary-collapse name="group2" open no-icon separator>
                    <x-slot:heading class="bg-blue-300">
                        <div class="flex items-center justify-between">
                            <span>Pendapatan Asli Desa</span>
                            <div class="flex items-center gap-3">
                                <span>Rp 400.000,000</span>
                                <x-mary-badge value="45%" class="badge-soft" />
                            </div>
                        </div>
                    </x-slot:heading>
                    <x-slot:content>
                        <ol class="px-5 text-start">
                            <li class="flex items-center justify-between py-1">
                                <span>Hasil Usaha Desa</span>
                                <span>Rp100.000,000</span>
                            </li>
                            <li class="flex items-center justify-between py-1">
                                <span>Pengelolaan Tanah Kas Desa</span>
                                <span>Rp100.000,000</span>
                            </li>
                            <li class="flex items-center justify-between py-1">
                                <span>Tanah Bergerak</span>
                                <span>Rp100.000,000</span>
                            </li>
                        </ol>
                    </x-slot:content>
                </x-mary-collapse>
                <x-mary-collapse name="group3" no-icon separator>
                    <x-slot:heading class="bg-blue-300">
                        <div class="flex items-center justify-between">
                            <span>Pendapatan Lain-lain</span>
                            <div class="flex items-center gap-3">
                                <span>Rp 400.000,000</span>
                                <x-mary-badge value="45%" class="badge-soft" />
                            </div>
                        </div>
                    </x-slot:heading>
                    <x-slot:content></x-slot:content>
                </x-mary-collapse>
            </x-mary-accordion>

            <div class="flex-1 space-y-5">
                <x-mary-collapse class="shadow-lg" name="group1" open no-icon separator>
                    <x-slot:heading class="bg-blue-300">
                        <div class="flex items-center justify-between">
                            <span>Pembiayaan</span>
                            <div class="flex items-center gap-3">
                                <span>Rp 400.000,000</span>
                            </div>
                        </div>
                    </x-slot:heading>
                    <x-slot:content>
                        <ol class="px-5 text-start">
                            <li class="flex items-center justify-between py-1">
                                <span>Silpa Indiktif Tahun 20254</span>
                                <span>Rp100.000,000</span>
                            </li>
                        </ol>
                    </x-slot:content>
                </x-mary-collapse>
    
                <x-mary-collapse class="shadow-lg" name="group2" open no-icon separator>
                    <x-slot:heading class="bg-blue-300">
                        <div class="flex items-center justify-between">
                            <span>Belanja
                            </span>
                            <div class="flex items-center gap-3">
                                <span>Rp 400.000,000</span>
                            </div>
                        </div>
                    </x-slot:heading>
                    <x-slot:content>
                        <ol class="px-5 text-start">
                            <li class="flex items-center justify-between py-1">
                                <span>Rp100.000,000</span>
                            </li>
                        </ol>
                    </x-slot:content>
                </x-mary-collapse>
            </div>
        </div>
    </x-container>

    <x-container class="!max-w-4xl">
        <div class="text-center">
            <x-header class="mb-8">Belanja Desa Berdasarkan Klasifikasi Kegiatan</x-header>
            <div class="px-5 mx-auto">
                <x-mary-accordion class="shadow-lg">
                    <x-mary-collapse name="group1" separator>
                        <x-slot:heading class="bg-red-200">
                            <div class="flex items-center justify-between">
                                <span>Operasional Pemerintahan Desa</span>
                                <div class="flex items-center gap-3">
                                    <span>Rp 400.000,000</span>
                                    <x-mary-badge value="45%" class="badge-soft" />
                                </div>
                            </div>
                        </x-slot:heading>
                        <x-slot:content>
                            <ol class="px-5 list-decimal text-start">
                                <li>Gaji Perangkat Desa</li>
                                <li>Biaya Pembangunan</li>
                            </ol>
                        </x-slot:content>
                    </x-mary-collapse>
                    <x-mary-collapse name="group2" separator>
                        <x-slot:heading class="bg-blue-200">
                            <div class="flex items-center justify-between">
                                <span>Biaya Pembangunan</span>
                                <div class="flex items-center gap-3">
                                    <span>Rp 400.000,000</span>
                                    <x-mary-badge value="45%" class="badge-soft" />
                                </div>
                            </div>
                        </x-slot:heading>
                        <x-slot:content>
                            <ol class="px-5 list-decimal text-start">
                                <li>Pelaksanaan Pembangunan</li>
                            </ol>
                        </x-slot:content>
                    </x-mary-collapse>
                    <x-mary-collapse name="group3" separator>
                        <x-slot:heading class="bg-orange-200">
                            <div class="flex items-center justify-between">
                                <span>Pelaksanaan Pembangunan</span>
                                <div class="flex items-center gap-3">
                                    <span>Rp 400.000,000</span>
                                    <x-mary-badge value="45%" class="badge-soft" />
                                </div>
                            </div>
                        </x-slot:heading>
                        <x-slot:content>
                            <ol class="px-5 list-decimal text-start">
                                <li>Pelaksanaan Pembangunan</li>
                            </ol>
                        </x-slot:content>
                    </x-mary-collapse>
                </x-mary-accordion>
            </div>
        </div>
    </x-container>

    <x-container>
        <x-header class="mb-3 text-center">Presentase Belanja</x-header>
        <div class="flex items-center justify-center">
            <div class="justify-center flex-1">
                <x-mary-chart wire:model="belanjaChart" class="w-full max-w-md"/>
            </div>
            <div class="flex-1">
                <table>
                    @foreach ($belanjaChart['data']['labels'] as $index => $item)
                        <tr>
                            <td class="w-full p-2">
                                <div class="flex items-center overflow-hidden border rounded-lg shadow-lg">
                                    <span class="px-5 text-lg font-semibold">1</span>
                                    <div class="flex-1 p-3 font-semibold" style="background-color: {{ $belanjaChart['data']['datasets'][0]['backgroundColor'][$index] }}">
                                        {{ $item }}
                                    </div>
                                </div>
                            </td>
                            <td class="p-2">
                                <div class="w-full px-4 py-2 text-2xl font-semibold border rounded-lg shadow-lg" style="background-color: {{ $belanjaChart['data']['datasets'][0]['backgroundColor'][$index] }}">
                                    {{ "Rp".number_format($belanjaChart['data']['datasets'][0]['data'][$index]) }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </x-container>

    <x-container class="!max-w-4xl">
        <div class="text-center">
            <x-header class="mb-8">Prioritas Penggunaan Dana Desa Tahun 2025</x-header>
            <div class="px-5 mx-auto">
                <x-mary-accordion class="shadow-lg">
                    <x-mary-collapse name="group1" separator>
                        <x-slot:heading class="bg-red-200">
                            <div class="flex items-center justify-between">
                                <span>Operasional Pemerintahan Desa</span>
                                <div class="flex items-center gap-3">
                                    <span>Rp 400.000,000</span>
                                    <x-mary-badge value="45%" class="badge-soft" />
                                </div>
                            </div>
                        </x-slot:heading>
                        <x-slot:content>
                            <ol class="px-5 list-decimal text-start">
                                <li>Gaji Perangkat Desa</li>
                                <li>Biaya Pembangunan</li>
                            </ol>
                        </x-slot:content>
                    </x-mary-collapse>
                    <x-mary-collapse name="group2" separator>
                        <x-slot:heading class="bg-blue-200">
                            <div class="flex items-center justify-between">
                                <span>Biaya Pembangunan</span>
                                <div class="flex items-center gap-3">
                                    <span>Rp 400.000,000</span>
                                    <x-mary-badge value="45%" class="badge-soft" />
                                </div>
                            </div>
                        </x-slot:heading>
                        <x-slot:content>
                            <ol class="px-5 list-decimal text-start">
                                <li>Pelaksanaan Pembangunan</li>
                            </ol>
                        </x-slot:content>
                    </x-mary-collapse>
                    <x-mary-collapse name="group3" separator>
                        <x-slot:heading class="bg-orange-200">
                            <div class="flex items-center justify-between">
                                <span>Pelaksanaan Pembangunan</span>
                                <div class="flex items-center gap-3">
                                    <span>Rp 400.000,000</span>
                                    <x-mary-badge value="45%" class="badge-soft" />
                                </div>
                            </div>
                        </x-slot:heading>
                        <x-slot:content>
                            <ol class="px-5 list-decimal text-start">
                                <li>Pelaksanaan Pembangunan</li>
                            </ol>
                        </x-slot:content>
                    </x-mary-collapse>
                </x-mary-accordion>
            </div>
        </div>
    </x-container>
</div>


{{-- <div class="grid items-center grid-cols-2 gap-5">
    <div class="flex items-center border rounded-lg">
        <span class="px-5 text-lg">1</span>
        <div class="flex-1 p-3">
            {{ $item }}
        </div>
    </div>
    <span class="px-3 py-2 text-2xl font-semibold border rounded-lg">{{ "Rp".number_format($belanjaChart['data']['datasets'][0]['data'][$index]) }}</span>
</div> --}}