<div class="space-y-20">
    <div>
        <x-header class="mb-3 text-center">Anggaran Pelaksanaan</x-header>
        <div class="flex flex-col items-center justify-center gap-5 lg:flex-row md:gap-0">
            <div class="flex-1">
                <x-mary-chart wire:model="operationalChart" class="w-full max-w-md"/>
            </div>
            <div class="flex-1">
                <table>
                    @if ($operationalChart)
                        @foreach ($operationalChart['data']['labels'] as $index => $item)
                            <tr>
                                <td class="w-full p-2">
                                    <div class="flex items-center overflow-hidden border rounded-lg shadow-lg">
                                        <span class="px-3 mx-1.5 text-base md:text-lg font-semibold rounded" style="background-color: {{ $operationalChart['data']['datasets'][0]['backgroundColor'][$index] }}">{{ $loop->iteration }}</span>
                                        <div class="flex-1 p-2 text-sm font-semibold md:text-base">
                                            {{ $item }}
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="w-full px-4 py-2 text-base font-semibold border rounded-lg shadow-lg md:text-2xl whitespace-nowrap">
                                        {{ "Rp ".number_format($operationalChart['data']['datasets'][0]['data'][$index]) }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="w-full p-2">
                                <div class="flex items-center overflow-hidden border rounded-lg shadow-lg">
                                    <span class="px-3 mx-2 text-lg font-semibold bg-gray-100 rounded">-</span>
                                    <div class="flex-1 p-3 font-semibold">
                                        -
                                    </div>
                                </div>
                            </td>
                            <td class="p-2">
                                <div class="w-full px-4 py-2 text-2xl font-semibold border rounded-lg shadow-lg whitespace-nowrap">
                                    Rp ---,--
                                </div>
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
    
    <div class="flex-1">
        <x-header class="mb-8 text-center">Pelaksanaan Desa Berdasarkan Klasifikasi Kegiatan</x-header>
        @if ($operationalBudget)
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                @foreach ($operationalBudget->operationalTypes->split(2) as $splitIndex => $operationalSplit)
                    <div>
                        <x-mary-accordion class="shadow-lg" model="group{{ $splitIndex }}">
                            @foreach ($operationalSplit as $typeIndex => $operationalType)
                                <x-mary-collapse name="collapse{{ $splitIndex.'-'.$typeIndex }}" separator>
                                    <x-slot:heading class="bg-green-100">
                                        <div class="flex flex-col md:items-center md:justify-between md:flex-row">
                                            <span class="text-sm md:text-base">{{ $operationalType->operational_type_name }}</span>
                                            <div class="flex items-center justify-between gap-3">
                                                <span>Rp {{ number_format($operationalType->details->sum('value'), 2) }}</span>
                                                <x-mary-badge value="{{ number_format(($operationalType->details->sum('value') / $operationalBudget->total) * 100, 1) }}%" class="badge-soft" />
                                            </div>
                                        </div>
                                    </x-slot:heading>
                                    <x-slot:content>
                                        <ol class="px-5 list-decimal text-start">
                                            @foreach ($operationalType->details as $detail)
                                                <li class="flex justify-between gap-2 py-1 border-b last:border-b-0">
                                                    <span>{{ $detail->operational_detail_name }}</span>
                                                    <span>Rp{{ number_format($detail->value, 2) }}</span>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </x-slot:content>
                                </x-mary-collapse>
                            @endforeach
                        </x-mary-accordion>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <h3 class="text-xl">Belum ada data Pelaksanaan Kegiatan</h3>
            </div>
        @endif
    </div>
</div>