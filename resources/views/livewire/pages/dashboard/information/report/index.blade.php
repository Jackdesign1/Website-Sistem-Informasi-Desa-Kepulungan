<x-dashboard-container x-data="{newsStatus: ''}">
    <x-mary-modal wire:model='statusModalState' title="Ubah Status Artikel">
        <template x-if="newsStatus == 'draft'">
            <p>Anda yakin ingin mempublikasikan report?</p>
        </template>
        <template x-if="newsStatus == 'publish'">
            <p>Tarik publikasi report? <br> Report yang ditarik akan masuk ke list draft</p>
        </template>
    <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.statusModalState = false" />
            <x-mary-button x-text="newsStatus == 'draft'? 'Publish' : 'Draft'" wire:click="changeStatus()" spinner="changeStatus" class=" btn-warning" />
        </x-slot:actions>
    </x-mary-modal>

    <x-mary-modal wire:model='deleteModalState' title="Ubah Status Artikel">
        Anda yakin ingin menghapus report ini?
        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.deleteModalState = false" />
            <x-mary-button label="Hapus" wire:click="delete()" spinner="delete" class=" btn-warning" />
        </x-slot:actions>
    </x-mary-modal>


    <x-mary-header title="Report" progress-indicator separator>
        <x-slot:actions>
            <x-mary-button label="Tambah" icon="tabler.plus" class="btn-primary" :link="route('dashboard.information.report.create')"/>
        </x-slot:actions>
    </x-mary-header>

    <ul class="flex flex-col gap-3 rounded-lg">
        @foreach ($reports as $report)
            <li class="relative flex gap-3 p-6 overflow-hidden border rounded-lg shadow-lg">
                <div class="flex items-center gap-3">
                    <img class="object-cover h-24 min-w-24 aspect-square rounded-box" src="{{ asset($report->media->first()->url) }}"/>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="mb-1.5 capitalize text-lg">
                        <div class="font-semibold">
                            <a href="{{ route('dashboard.information.report.edit', ['key' => Crypt::encrypt($report->id)]) }}">{{ $report->title }}</a>
                        </div>
                        <div class="text-xs opacity-60">{{ $report->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="text-sm line-clamp-4 max-h-40 relative">
                        <div class="absolute bottom-0 left-0 right-0 z-20 min-h-8 bg-gradient-to-t from-white to-transparent"></div>
                        <a href="{{ route('dashboard.information.report.edit', ['key' => Crypt::encrypt($report->id)]) }}">
                            {!! $report->content !!}
                        </a>
                    </div>
                    <div class="overflow-x-auto max-w-full">
                        <div class="flex gap-5 pt-2">
                            @foreach ($report->fileMedia as $reportFile)
                            <div class="text-center w-32">
                                <a href="{{ asset($reportFile->url) }}" target="blank" title="{{ $reportFile->name }}">
                                    <x-mary-icon name='tabler.file-description' class="mb-2 w-12 h-12"></x-mary-icon>
                                </a>
                                <a href="{{ asset($reportFile->url) }}" target="blank" class="link text-sm line-clamp-2 link-hover text-primary" title="{{ $reportFile->name }}">{{ $reportFile->name }}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex gap-3 flex-col">
                    <div>
                        <x-mary-button icon="o-eye" tooltip="lihat" class="btn-circle !tooltip-bottom btn-ghost btn-sm"></x-mary-button>
                        <x-mary-button icon="tabler.edit" tooltip="edit" class="btn-circle !tooltip-bottom btn-ghost btn-sm" :link="route('dashboard.information.report.edit', ['key' => Crypt::encrypt($report->id)])"></x-mary-button>
                        <x-mary-button icon="o-trash" tooltip="hapus" class="btn-circle !tooltip-bottom btn-ghost btn-sm" @click="$wire.deleteModalState = true; $wire.selectedKey = '{{ Crypt::encrypt($report->id) }}'"></x-mary-button>
                    </div>
                    <div class="text-end">
                        <x-mary-button :label="$report->status == 'publish'? 'published' : 'draft'" class="{{ $report->status == 'publish'? 'btn-success' : '' }} capitalize"
                            @click="$wire.statusModalState = true; newsStatus = '{{ $report->status }}'; $wire.selectedKey = '{{ Crypt::encrypt($report->id); }}'" />
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</x-dashboard-contain>
