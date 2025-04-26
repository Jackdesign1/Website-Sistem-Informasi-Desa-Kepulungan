<div>
    <div class="py-10 text-center bg-gradient-to-tr from-green-300 to-green-200">
        <x-header>
            Kontak
        </x-header>
    </div>
    <x-container class="py-10">
        <x-mary-tabs wire:model="selectedContactTab" class="py-3">
            <x-mary-tab name="report" label="Laporan" class="px-8">
                <livewire:pages.contact.report />
            </x-mary-tab>
            <x-mary-tab name="checkReport" label="Cek Laporan" class="px-8">
                <livewire:pages.contact.check-report />
            </x-mary-tab>
            <x-mary-tab name="submission" label="Pengajuan Kerja Sama" class="px-8">
                <livewire:pages.contact.submission />
            </x-mary-tab>
        </x-mary-tabs>
    </x-container>    
</div>