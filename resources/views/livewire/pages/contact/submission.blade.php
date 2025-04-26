<div>
    <h2 class="mb-4 text-2xl font-semibold text-black">Form Pengajuan Kerja Sama</h2>
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
            <x-mary-button class="btn-success" label="Submit"></x-mary-button>
        </x-mary-form>
    </div>
</div>
