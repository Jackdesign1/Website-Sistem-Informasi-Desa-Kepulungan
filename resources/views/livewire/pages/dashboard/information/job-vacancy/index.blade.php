<x-dashboard-container x-data="{currentJobsStatus: '', selectedKey: ''}">
    <x-mary-modal wire:model="createJobVacancyModalState" class="backdrop-blur" box-class="!max-w-4xl">
        <livewire:pages.dashboard.information.job-vacancy.create />
    </x-mary-modal>

    <x-mary-modal wire:model='editJobVacancyModalState' class="backdrop-blur" box-class="!max-w-4xl">
        <livewire:pages.dashboard.information.job-vacancy.edit />
    </x-mary-modal>

    <x-mary-modal wire:model='deleteModalState' title="Hapus Lowongan Pekerjaan" class="backdrop-blur">
        <p>Anda yakin ingin menghapus lowongan pekerjaan ini?</p>
        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.deleteModalState = false" />
            <x-mary-button label="Hapus" wire:click="delete(selectedKey)" spinner="delete" class=" btn-warning" />
        </x-slot:actions>
    </x-mary-modal>

    <x-mary-modal wire:model='statusModalState' title="Ubah Status Lowongan Pekerjaan" class="backdrop-blur">
        <template x-if="currentJobsStatus == 'closed'">
            <div>
                <p>Anda yakin ingin membuka lowongan?</p>
                <x-mary-datetime label="Batas Lowongan" wire:model="expiresAt" hint="Batas Akhir Lowongan"/>
            </div>
        </template>
        <template x-if="currentJobsStatus == 'open'">
            <p>Tarik lowongan pekerjaan? <br> lowongan yang ditutup akan tetap dapat dilihat pengguna</p>
        </template>
        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.statusModalState = false; $wire.set('expiresAt', null)" />
            <x-mary-button x-text="currentJobsStatus == 'closed'? 'Open' : 'Close'" @click="$wire.changeStatus(selectedKey)" spinner="changeStatus" class=" btn-warning" />
        </x-slot:actions>
    </x-mary-modal>

    <x-mary-header title="Lowongan Pekerjaan" progress-indicator separator>
        <x-slot:actions>
            <x-mary-button label="Tambah" icon="tabler.plus" class="btn-primary" wire:click='createJobVacancyModalState = true'/>
        </x-slot:actions>
    </x-mary-header>
    <ul class="gap-3 rounded-lg list">
        @foreach ($job_vacancies as $jobs)
            <li class="relative border shadow-lg list-row" x-data="{showMore: false}">
                <div><img class="object-cover size-10 rounded-box" src="{{ asset($jobs->company_logo) }}"/></div>
                <div>
                    <div>{{ $jobs->company_name }}</div>
                    <div class="text-sm font-semibold capitalize opacity-60">Posisi: <span class="font-semibold">{{ $jobs->position }}</span></div>
                    <div class="text-sm font-semibold capitalize opacity-60">Batas Akhir Lowongan: <span class="font-semibold">{{ $jobs->expires_at? date('d M Y', strtotime($jobs->expires_at)) : '-' }}</span></div>
                </div>
                <div class="list-col-wrap pb-1.5">
                    <div class="text-xl font-semibold capitalize">{{ $jobs->title }}</div>
                    <div class="text-sm font-semibold opacity-60">Nomor Kontak: <span class="font-semibold">{{ $jobs->contact_email }}</span></div>
                    {{-- <div class="text-sm" :class="!showMore? 'line-clamp-3' : ''">
                        {{ $jobs->description }}
                    </div> --}}
                </div>
                <div class="flex items-end text-end list-col-wrap">
                    {{-- <x-mary-button x-text="!showMore? 'Show More' : 'Show Less'" @click="showMore = !showMore" class="btn-sm btn-ghost" /> --}}
                    <x-mary-button :label="$jobs->status == 'open'? 'Open' : 'Closed'" class="{{ $jobs->status == 'open'? 'btn-success' : '' }} capitalize"
                        @click="$wire.statusModalState = true; currentJobsStatus = '{{ $jobs->status }}'; selectedKey = '{{ Crypt::encrypt($jobs->id); }}'" />
                </div>
                <div class="absolute z-10 right-3 top-2">
                    <x-mary-button icon="tabler.edit" tooltip="edit" class="btn-circle !tooltip-bottom btn-ghost btn-sm" wire:click="editJobVacancyModalState = true; $wire.dispatch('initEditJobVacancy', {'key': '{{ Crypt::encrypt($jobs->id) }}'})"></x-mary-button>
                    <x-mary-button icon="o-trash" tooltip="hapus" class="btn-circle !tooltip-bottom btn-ghost btn-sm" @click="$wire.deleteModalState = true; selectedKey = '{{ Crypt::encrypt($jobs->id) }}'"></x-mary-button>
                </div>
            </li>
        @endforeach
    </ul>
</x-dashboard-container>
