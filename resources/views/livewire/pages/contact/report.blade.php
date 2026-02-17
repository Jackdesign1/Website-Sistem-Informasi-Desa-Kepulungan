<div class="mx-auto">
    <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Kontak</h2>
    
    <div class="flex flex-col gap-8 md:flex-row">
        <x-contact.contact-information-card />

        <div class="p-8 bg-whitep">
            <h3 class="mb-2 text-xl font-bold">Form Laporan Warga</h3>
            <p class="mb-6 text-sm text-gray-500">Sampaikan aspirasi, keluhan, atau laporan Anda kepada Pemerintah Desa Kepulungan</p>

            <form wire:submit.prevent="sendToWhatsapp" class="space-y-4">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" wire:model="nama" placeholder="Masukkan nama lengkap" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        @error('nama') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model="email" placeholder="nama@email.com" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                        <input type="text" wire:model="telepon" placeholder="08xxxxxxxxxx" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kategori Laporan</label>
                        <select wire:model="kategori" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                            <option value="">Pilih Kategori</option>
                            <option value="Infrastruktur">Infrastruktur</option>
                            <option value="Keamanan">Keamanan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Judul Laporan</label>
                    <input type="text" wire:model="judul" placeholder="Ringkasan singkat laporan Anda" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Isi Laporan</label>
                    <textarea wire:model="isi" rows="4" placeholder="Jelaskan detail laporan Anda..." class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"></textarea>
                    <p class="mt-1 text-xs text-right text-gray-400">Maksimal 1000 karakter</p>
                </div>

                <button type="submit" class="flex items-center justify-center w-full gap-2 py-3 font-bold text-white transition duration-200 bg-green-600 rounded-lg hover:bg-green-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                    Kirim Laporan
                </button>
            </form>
        </div>
    </div>
</div>
