<div>
    <x-mary-header title="Tambah Lowongan Pekerjaan" progress-indicator="create" separator/>

    <form wire:submit='create'>
        <div class="flex flex-col gap-8 md:flex-row">
            <x-mary-file wire:model="companyLogo" label="Logo Perusahaan" accept="image/png, image/jpeg" class="mr-3" required>
                <img src="{{ asset('assets/icons/blank-user-profile.png') }}" class="w-24 h-24 rounded-lg" />
            </x-mary-file>
            <div class="flex-1 mb-7">
                <div class="flex flex-col gap-4 mb-3 md:flex-row">
                    <div class="flex-1">
                        <x-mary-input label="Nama Perusahaan" wire:model="companyName" hint="Nama Perusahaan Pemberi Lowongan" required/>
                    </div>
                    <div class="flex-1">
                        <x-mary-input label="Kontak" wire:model="contactEmail" hint="Nomor Yang Dapat Dihubungi" required/>
                    </div>
                    <div class="flex-1">
                        <x-mary-datetime label="Batas Lowongan" wire:model="expiresAt" hint="Batas Akhir Lowongan"/>
                    </div>
                </div>
                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="flex-1">
                        <x-mary-input label="Judul" wire:model="title" placeholder="Judul Lowongan Kerja" required/>
                    </div>
                    <div class="flex-1">
                        <x-mary-input label="Posisi" wire:model="position" placeholder="Posisi Pekerjaan" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <x-mary-button type="submit" label="Tambah" icon="tabler.plus" class="mr-3 btn-primary"/>
            <x-mary-button label="Cancel" class="btn-danger" wire:click='$parent.createJobVacancyModalState = false; $wire.resetPage()'/>
        </div>
    </form>
</div>
