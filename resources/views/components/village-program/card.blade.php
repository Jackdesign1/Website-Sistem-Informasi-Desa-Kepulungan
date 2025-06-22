@props(['villageProgram'])

<x-mary-card title="Program Desa Tahun {{ $villageProgram->year }}" shadow class="relative border shadow-lg">
    <x-mary-collapse>
        <x-slot:heading>
            Detail Program Desa
        </x-slot:heading>
        <x-slot:content>
            <x-mary-accordion wire:model='accordionState'>
                @forelse ($villageProgram->details as $detailIndex => $detail)
                    <x-mary-collapse :name="'detail-'.$detailIndex" separator wire:key='{{ $detailIndex }}'>
                        <x-slot:heading>
                        <div class="flex items-center gap-2">
                            <span class="text-xl">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span> {{ $detail->title?? '-' }}
                        </div>
                        </x-slot:heading>
                        <x-slot:content>
                            <ol class="px-5 text-start">
                                <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                                    <span class="font-semibold">Nama Program</span>
                                    <span>{{ $detail->title?? '-' }}</span>
                                </li>
                                <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                                    <span class="font-semibold">Status</span>
                                    <span>{{ $detail->status_label?? '-' }}</span>
                                </li>
                                <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                                    <span class="font-semibold">Anggaran</span>
                                    <span>{{ $detail->budget?? '-' }}</span>
                                </li>
                                <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                                    <span class="font-semibold">Tanggal Mulai</span>
                                    <span>{{ $detail->start_date?? '-' }}</span>
                                </li>
                                <li class="flex flex-col gap-2 py-1 border-b md:justify-between md:flex-row last:border-b-0">
                                    <span class="font-semibold">Tanggal Selesai</span>
                                    <span>{{ $detail->end_date?? '-' }}</span>
                                </li>
                                <li>
                                    <div class="font-semibold">Deskripsi</div>
                                    <span>{{ $detail->description?? '-' }}</span>
                                </li>
                            </ol>
                        </x-slot:content>
                    </x-mary-collapse>
                @empty
                    <x-mary-collapse :name="'detail-0'" separator>
                        <x-slot:heading>
                        <div class="flex flex-col flex-wrap gap-2 py-1 border-b sm:items-center sm:justify-between sm:flex-row last:border-b-0">
                            <span>Nama Program</span>
                            <span>-</span>
                        </div>
                        </x-slot:heading>
                        <x-slot:content>
                        <ol class="px-5 text-start">
                            <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                <span>Nama Program</span>
                                <span>-</span>
                            </li>
                            <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                <span>Status</span>
                                <span>-</span>
                            </li>
                            <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                <span>Anggaran</span>
                                <span>-</span>
                            </li>
                            <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                <span>Tanggal Mulai</span>
                                <span>-</span>
                            </li>
                            <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                <span>Tanggal Selesai</span>
                                <span>-</span>
                            </li>
                            <li>
                                <span>Deskripsi</span>
                                <span>-</span>
                            </li>
                        </ol>
                        </x-slot:content>
                    </x-mary-collapse>
                @endforelse
            </x-mary-accordion>
        </x-slot:content>
    </x-mary-collapse>
    <div class="flex justify-end gap-2 mt-3">
        <x-mary-button icon="tabler.edit"
            :link="route('dashboard.village-program.edit', ['key' => Crypt::encrypt($villageProgram->id)])"
            class="btn-sm btn-circle" />
        <x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data pendapatan tahun {{ $villageProgram->year }}?')? $wire.delete('{{ Crypt::encrypt($villageProgram->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
    </div>
</x-mary-card>
