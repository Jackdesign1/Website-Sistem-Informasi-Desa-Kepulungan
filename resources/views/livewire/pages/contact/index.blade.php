<div class="min-h-screen pb-12 bg-gray-50">
    <div class="px-4 py-12 text-center text-white bg-green-700">
        <h1 class="text-3xl font-bold">Kontak & Layanan Warga</h1>
        <p class="mt-2 opacity-90">Hubungi kami atau sampaikan laporan Anda dengan mudah</p>
        <div class="flex justify-center gap-4 mt-6">
            <button class="flex items-center gap-2 px-6 py-2 font-medium text-green-700 bg-white rounded-lg shadow-sm hover:bg-gray-100">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                Hubungi Kami
            </button>
            <button class="flex items-center gap-2 px-6 py-2 font-medium text-white bg-green-800 rounded-lg shadow-sm hover:bg-green-900">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Buat Laporan
            </button>
        </div>
    </div>
    <x-container class="pt-10 pb-0">
        <x-mary-tabs wire:model="selectedContactTab" class="py-3">
            <x-mary-tab name="report" label="Laporan">
                <livewire:pages.contact.report />
            </x-mary-tab>
            {{-- <x-mary-tab name="checkReport" label="Cek Laporan">
                <livewire:pages.contact.check-report />
            </x-mary-tab> --}}
            <x-mary-tab name="submission" label="Pengajuan Kerja Sama">
                <livewire:pages.contact.submission />
            </x-mary-tab>
        </x-mary-tabs>
    </x-container>


    <x-container>
        <div class="px-4 py-16 bg-white border border-gray-100 shadow-sm rounded-2xl">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-gray-900">Hubungi Kami</h2>
                <p class="mt-2 text-gray-600">Ingin bekerja sama atau berkonsultasi dengan Pemerintah Desa Kepulungan?</p>
            </div>

            <div class="grid max-w-6xl grid-cols-1 gap-8 mx-auto md:grid-cols-3">
                <div class="flex flex-col items-center p-8 text-center border border-green-100 shadow-sm bg-green-50 rounded-2xl">
                    <div class="flex items-center justify-center w-16 h-16 mb-4 bg-green-600 rounded-full shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Kepala Desa</h3>
                    <p class="mb-6 text-sm font-medium text-green-700">Didik Hartono S.H., M.H</p>
                    
                    <div class="w-full mb-8 space-y-3 text-sm text-left text-gray-600">
                        <div class="flex items-start gap-3">
                            <span class="text-green-600">💼</span>
                            <p>Untuk: Kerja sama strategis, kebijakan desa</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-green-600">📞</span>
                            <p>(0343) 123-456</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-green-600">✉️</span>
                            <p class="truncate">kades@kepulungan.desa.id</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-green-600">🕒</span>
                            <p>Senin-Jumat, 08.00-15.00</p>
                        </div>
                    </div>
                    
                    <a href="https://wa.me/628123456789" target="_blank" class="flex items-center justify-center w-full gap-2 py-3 font-semibold text-white transition duration-300 bg-green-600 hover:bg-green-700 rounded-xl">
                        <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                    </a>
                </div>

                <div class="flex flex-col items-center p-8 text-center border border-blue-100 shadow-sm bg-blue-50 rounded-2xl">
                    <div class="flex items-center justify-center w-16 h-16 mb-4 bg-blue-600 rounded-full shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Sekretaris Desa</h3>
                    <p class="mb-6 text-sm font-medium text-blue-700">Siti Aminah, S.Sos</p>
                    
                    <div class="w-full mb-8 space-y-3 text-sm text-left text-gray-600">
                        <div class="flex items-start gap-3">
                            <span class="text-blue-600">💼</span>
                            <p>Untuk: Administrasi, surat menyurat</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-blue-600">📞</span>
                            <p>(0343) 123-457</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-blue-600">✉️</span>
                            <p class="truncate">sekdes@kepulungan.desa.id</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-blue-600">🕒</span>
                            <p>Senin-Jumat, 08.00-16.00</p>
                        </div>
                    </div>
                    
                    <a href="https://wa.me/628123456780" target="_blank" class="flex items-center justify-center w-full gap-2 py-3 font-semibold text-white transition duration-300 bg-blue-600 hover:bg-blue-700 rounded-xl">
                        <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                    </a>
                </div>

                <div class="flex flex-col items-center p-8 text-center border border-orange-100 shadow-sm bg-orange-50 rounded-2xl">
                    <div class="flex items-center justify-center w-16 h-16 mb-4 bg-orange-600 rounded-full shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Kantor Desa</h3>
                    <p class="mb-6 text-sm font-medium text-orange-700">Layanan Umum</p>
                    
                    <div class="w-full mb-8 space-y-3 text-sm text-left text-gray-600">
                        <div class="flex items-start gap-3">
                            <span class="text-orange-600">💼</span>
                            <p>Untuk: Layanan masyarakat umum</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-orange-600">📞</span>
                            <p>(0343) 123-458</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-orange-600">✉️</span>
                            <p class="truncate">desa.kepulungan@pasuruan.go.id</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-orange-600">🕒</span>
                            <p>Senin-Jumat, 08.00-16.00</p>
                        </div>
                    </div>
                    
                    <a href="https://maps.google.com" target="_blank" class="flex items-center justify-center w-full gap-2 py-3 font-semibold text-white transition duration-300 bg-orange-600 hover:bg-orange-700 rounded-xl">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                        Lihat Lokasi
                    </a>
                </div>
            </div>
        </div>
    </x-container>
</div>
