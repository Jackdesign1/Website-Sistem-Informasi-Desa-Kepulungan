<div>
    <x-mary-header title="Ubah Lowongan Pekerjaan" progress-indicator="edit" separator/>

    <form wire:submit='edit'>
        <div class="flex flex-col gap-8 md:flex-row">
            <div class="relative w-fit group">
                <x-mary-file wire:model.live.debounce="newCompanyLogo" label="Foto Profil" accept="image/png, image/jpeg" class="relative z-20">
                    <img src="{{ asset('assets/icons/blank-transparent.png') }}" class="w-24 h-24 rounded-lg" />
                </x-mary-file>
                @if ($oldCompanyLogo && !$newCompanyLogo)
                    <div class="absolute bottom-0 left-0 right-0 z-10 mb-2 transition top-8 group-hover:scale-105">
                        <img src="{{ asset($oldCompanyLogo) }}" class="object-cover w-24 h-24 rounded-lg" />
                    </div>
                @endif
            </div>
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
            <x-mary-button type="submit" label="Ubah" icon="tabler.plus" class="mr-3 btn-primary"/>
            <x-mary-button label="Cancel" class="btn-danger" wire:click='$parent.editJobVacancyModalState = false; $wire.resetPage()'/>
        </div>
    </form>
</div>
