<div class="mx-auto">
    <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Pengajuan Kerja Sama</h2>
    
    <div class="flex flex-col gap-8 md:flex-row">
        <x-contact.contact-information-card />

        <div class="p-8 bg-white border border-gray-100 shadow-sm md:w-2/3 rounded-2xl">
            <h3 class="mb-2 text-xl font-bold">Form Pengajuan Kerjasama</h3>
            <p class="mb-6 text-sm text-gray-500">Sampaikan Pengajuan Kerjasama Anda kepada Pemerintah Desa Kepulungan</p>

            <x-mary-form class="space-y-4">
                <div class="flex gap-4">
                    <div class="flex-1">
                        <x-mary-input label="Nama Pengaju/Instansi" placeholder="Masukkan Nama/Instansi"></x-mary-input>
                    </div>
                    <div class="flex-1">
                        <x-mary-input label="Email" placeholder="Masukkan Email"></x-mary-input>
                    </div>
                </div>
                <div>
                    @php
                        $options = [
                            ['id' => 'CSR', 'name' => 'CSR'],
                            ['id' => 'KKN', 'name' => 'KKN'],
                            ['id' => 'Lainnya', 'name' => 'Lainnya'],
                        ]
                    @endphp
                    <x-mary-select label="Jenis Kerja Sama" placeholder="Pilih Jenis Kerja Sama" :options="$options" />
                </div>
                <div>
                    <x-mary-textarea label="Deskripsi Kerja Sama" placeholder="Masukkan Deskripsi Kerja Sama" hint="Max 1000 Karakter" rows="7" />
                </div>
                <x-mary-button class="btn-success">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                    Kirim Pengajuan
                </x-mary-button>
            </x-mary-form>
        </div>
    </div>
</div>
