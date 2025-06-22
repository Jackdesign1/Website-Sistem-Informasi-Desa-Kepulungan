<div x-data='{hideItem: true}'>
    <div class="flex items-center justify-between mb-5">
        <x-header class="mb-8">
            Program Desa
        </x-header>
        <x-mary-select class="mb-5" :options="$years" option-label="label" option-value="year" wire:model.live='selectedYear' label="Pilih Tahun Anggaran" placeholder="Pilih Tahun" icon="o-calendar"></x-mary-select>
    </div>
    <div class="relative flex flex-wrap w-full gap-5 mb-5 overflow-hidden transition-all md:overflow-visible md:max-h-screen" :class="hideItem? 'max-h-[39rem]' : 'max-h-screen'" x-cloak>
        @isset($villageProgram->details)
            @foreach ($villageProgram->details as $detail)
                <div class="flex-1 border shadow-lg rounded-xl min-w-72 max-w-96">
                    <x-mary-card :title="$loop->iteration.' '.$detail->title" separator>
                        <div x-data="{showMore: false}" class="text-sm">
                            <div
                                :class="!showMore? 'max-h-11' : 'max-h-screen'"
                                class="overflow-hidden transition-all duration-300 ease-linear">
                                <ol class="px-5 list-decimal text-start">
                                    <li class="flex flex-col gap-1 py-1 border-b last:border-b-0">
                                        <span class="font-semibold">Status</span>
                                        <span>{{ $detail->status_label }}</span>
                                    </li>
                                    <li class="flex flex-col gap-1 py-1 border-b last:border-b-0">
                                        <span class="font-semibold">Anggaran</span>
                                        <span>Rp{{ number_format($detail->budget, 0) }}</span>
                                    </li>
                                    <li class="flex flex-col gap-1 py-1 border-b last:border-b-0">
                                        <span class="font-semibold">Tanggal Mulai-Selesai</span>
                                        <span>
                                            {{ $detail->start_date ? date('d/M/y', strtotime($detail->start_date)) : 'N/A' }}
                                            -
                                            {{ $detail->end_date ? date('d/M/y', strtotime($detail->end_date)) : 'N/A' }}
                                        </span>
                                    </li>
                                    <li class="flex flex-col gap-1 py-1 border-b last:border-b-0">
                                        <div class="font-semibold">Deskripsi</div>
                                        <span>
                                            {{ $detail->description }}
                                        </span>
                                    </li>
                                </ol>
                            </div>
                            <button class="mt-2 text-blue-600 link" x-text="!showMore ? 'Show more' : 'Show less'" x-on:click="showMore = !showMore"></button>
                        </div>
                    </x-mary-card>
                </div>
            @endforeach
        @else
            <div class="w-full py-10 font-semibold text-center text-gray-500">
                Tidak ada data ditemukan
            </div>
        @endisset
        <div class="absolute bottom-0 left-0 right-0 h-14 bg-gradient-to-t from-white to-transparent md:hidden"></div>
    </div>
    <div class="text-center md:hidden">
        <template x-if="hideItem">
            <x-mary-button class="btn btn-success" label="Lihat Semua Layanan" x-on:click="hideItem = false" />
        </template>
        <template x-if="!hideItem">
            <x-mary-button class="btn btn-outline" label="Sembunyikan Sebagian Layanan" x-on:click="hideItem = true" />
        </template>
    </div>
</div>
