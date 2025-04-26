<div>
    <h2 class="mb-3 text-2xl font-semibold text-black">Form Lapor Warga</h2>
    <x-mary-form class="space-y-4">
        <div class="flex gap-4">
            <div class="flex-1">
                <x-mary-input label="Nama" placeholder="Masukkan Nama"></x-mary-input>
            </div>
            <div class="flex-1">
                <x-mary-input label="Email" placeholder="Masukkan Email"></x-mary-input>
            </div>
        </div>
        <div>
            <x-mary-textarea label="Isi Laporan" hint="Max 1000 Karakter" rows="7"></x-mary-textarea>
        </div>
        <x-mary-button class="btn-success" label="Submit"></x-mary-button>
    </x-mary-form>
</div>
