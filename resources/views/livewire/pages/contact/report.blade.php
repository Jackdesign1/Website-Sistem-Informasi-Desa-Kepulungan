<div class="mx-auto">
    <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Kontak</h2>
    
    <div class="flex flex-col gap-8 md:flex-row">
        <x-contact.contact-information-card />

        <div class="p-8 bg-white border border-gray-100 shadow-sm md:w-2/3 rounded-2xl">
            <h3 class="mb-2 text-xl font-bold">Form Laporan Warga</h3>
            <p class="mb-6 text-sm text-gray-500">Sampaikan aspirasi, keluhan, atau laporan Anda kepada Pemerintah Desa Kepulungan</p>

            <x-mary-form class="space-y-4" wire:submit='sendToWhatsapp'>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <x-mary-input wire:model="name" placeholder="Masukkan nama lengkap" label="Nama Lengkap" />
                    </div>
                    <div>
                        <x-mary-input type="email" wire:model="email" placeholder="nama@email.com" label="Email" />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <x-mary-input wire:model="phone" placeholder="08xxxxxxxxxx" label="Nomor Telepon" />
                    </div>
                    <div>
                        @php
                            $options = [
                                ['id' => 'Infrastruktur', 'name' => 'Infrastruktur'],
                                ['id' => 'Keamanan', 'name' => 'Keamanan'],
                                ['id' => 'Lainnya', 'name' => 'Lainnya'],
                            ]
                        @endphp
                        <x-mary-select label="Kategori Laporan" wire:model='category' placeholder="Pilih Kategori" :options="$options" />
                    </div>
                </div>

                <div>
                    <x-mary-input label="Subjek" type="text" wire:model="title" placeholder="Ringkasan singkat laporan Anda" />
                </div>

                <div>
                    <x-mary-textarea label="Isi Laporan" wire:model='description' placeholder="Jelaskan detail laporan Anda..." hint="Max 1000 Karakter" rows="7" />
                </div>

                <x-mary-button type="submit" class="btn-success">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                    Kirim Laporan
                </x-mary-button>
            </x-mary-form>
        </div>
    </div>
</div>
