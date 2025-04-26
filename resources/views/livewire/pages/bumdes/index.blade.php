<x-container class="py-12">
    <x-header class="mb-8">
        Badan Usaha Milik Desa Kepulungan
    </x-header>
    <div class="grid grid-cols-3 gap-5">
        @foreach (collect()->range(3, 6) as $bumdes)
            <div class="overflow-hidden transition duration-300 transform border rounded-lg shadow-lg bg-gray-50">
                <img src="{{ asset('assets/images/badan-usaha-milik-desa.png') }}" alt="BUMDes Maju Jaya" class="object-cover w-full h-48">
                <div class="p-6">
                    <h3 class="mb-2 text-xl font-semibold text-black">BUMDes Maju Jaya</h3>
                    <p class="mb-4 text-gray-600">Mengolah hasil pertanian desa menjadi produk olahan seperti keripik singkong dan sari buah segar.</p>
                    <div class="space-y-2">
                        <p><span class="font-medium text-gray-700">Jenis Usaha:</span> Agribisnis</p>
                        <p><span class="font-medium text-gray-700">Tahun Berdiri:</span> 2018</p>
                        <p><span class="font-medium text-gray-700">Kontak:</span> 0812-3456-7890</p>
                        <p><span class="font-medium text-gray-700">Produk Unggulan:</span> Keripik Singkong Rasa Balado</p>
                    </div>
                    <!-- Social Media Links -->
                    <div class="flex mt-4 space-x-3">
                        <a href="https://instagram.com" target="_blank" class="text-brown-700 hover:text-brown-800">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-brown-700 hover:text-brown-800">
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </a>
                        <a href="https://maju-jaya.com" target="_blank" class="text-brown-700 hover:text-brown-800">
                            <i class="fas fa-globe fa-lg"></i>
                        </a>
                    </div>
                    <!-- Gallery -->
                    <div class="mt-4">
                        <h4 class="mb-2 text-sm font-medium text-gray-700">Sekilas Galeri</h4>
                        <div class="flex space-x-2">
                            <img src="{{ asset('assets/images/badan-usaha-milik-desa.png') }}" alt="Bank Sampah Hijau" class="object-cover w-24 h-24 rounded-md">
                            <img src="{{ asset('assets/images/badan-usaha-milik-desa.png') }}" alt="Bank Sampah Hijau" class="object-cover w-24 h-24 rounded-md">
                        </div>
                    </div>
                    {{-- <x-mary-button label="Lihat Detail" /> --}}
                </div>
            </div>
        @endforeach
    </div>
</x-contai>
