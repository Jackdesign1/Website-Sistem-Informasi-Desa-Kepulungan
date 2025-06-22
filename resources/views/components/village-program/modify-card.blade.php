{{-- <x-mary-collapse :name="'detail-'.$index" separator wire:key='{{ $index }}'>
    <x-slot:heading>
    <div class="flex items-center gap-2">
        <span class="text-xl">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span> {{ $detail['title']?? '-' }}
    </div>
    </x-slot:heading>
    <x-slot:content>
        <ol class="px-5 text-start">
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Nama Program</span>
                <span>{{ $detail['title']?? '-' }}</span>
            </li>
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Status</span>
                <span>{{ $detail['status']?? '-' }}</span>
            </li>
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Anggaran</span>
                <span>{{ $detail['budget']? number_format($detail['budget'], 0) : '-' }}</span>
            </li>
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Tanggal Mulai</span>
                <span>{{ $detail['start_date']?? '-' }}</span>
            </li>
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Tanggal Selesai</span>
                <span>{{ $detail['end_date']?? '-' }}</span>
            </li>
            <li>
                <div class="font-semibold">Deskripsi</div>
                <span>{{ $detail['description']?? '-' }}</span>
            </li>
            <li class="text-end">
                <x-mary-button type="button" class="btn-warning btn-sm" icon="tabler.trash" wire:click="removeDetailProgram('{{ $index }}')" wire:confirm='Anda yakin ingin menghapus program ini?'></x-mary-button>
            </li>
        </ol>
    </x-slot:content>
</x-mary-collapse> --}}

@props([
    // state is it for create or edit
    'state' => 'create',
    'index',
    'loop',
    'detail'
])
<x-mary-collapse :name="'detail-'.$index" separator wire:key='{{ $index }}'>
    <x-slot:heading>
    <div class="flex items-center gap-2">
        <span class="text-xl">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span> {{ $detail['title']?? '-' }}
        @if(empty($detail['key']))
            <x-mary-badge value="Baru" class="badge-primary" />
        @endif
    </div>
    </x-slot:heading>
    <x-slot:content>
        <ol class="px-5 text-start">
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Nama Program</span>
                <span>{{ $detail['title']?? '-' }}</span>
            </li>
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Status</span>
                <span>
                    @php
                        $statusMap = [
                            'planned' => 'Perencanaan',
                            'in_progress' => 'Berjalan',
                            'completed' => 'Selesai',
                        ];
                        $status = $detail['status'] ?? '-';
                    @endphp
                    {{ $statusMap[$status] ?? '-' }}
                </span></span>
            </li>
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Anggaran</span>
                <span>{{ $detail['budget']? number_format($detail['budget'], 0) : '-' }}</span>
            </li>
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Tanggal Mulai</span>
                <span>{{ $detail['start_date']?? '-' }}</span>
            </li>
            <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                <span class="font-semibold">Tanggal Selesai</span>
                <span>{{ $detail['end_date']?? '-' }}</span>
            </li>
            <li>
                <div class="font-semibold">Deskripsi</div>
                <span>{{ $detail['description']?? '-' }}</span>
            </li>
            <li class="text-end">
                @if ($state == 'edit')
                    <x-mary-button
                        class="btn-sm"
                        icon="tabler.edit"
                        wire:click="editDetailProgram('{{ $index }}'); $wire.createEditDetailModal = true"
                    />
                @endif
                <x-mary-button
                    type="button"
                    class="{{ isset($detail['key'])? 'btn-error' : 'btn-warning' }} btn-sm"
                    icon="tabler.trash"
                    wire:click="removeDetailProgram('{{ $index }}')"
                    wire:confirm="Anda yakin ingin menghapus program ini?{{ isset($detail['key'])? '\nData akan otomatis terhapus dari database' : '' }}"
                />
            </li>
        </ol>
    </x-slot:content>
</x-mary-collapse>
