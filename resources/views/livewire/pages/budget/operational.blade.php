<div class="space-y-20">
    <div>
        <x-header class="mb-3 text-center">Anggaran Pelaksanaan</x-header>
        <div class="flex items-center justify-center">
            <div class="justify-center flex-1">
                <x-mary-chart wire:model="operationalChart" class="w-full max-w-md"/>
            </div>
            <div class="flex-1">
                <table>
                    @foreach ($operationalChart['data']['labels'] as $index => $item)
                        <tr>
                            <td class="w-full p-2">
                                <div class="flex items-center overflow-hidden border rounded-lg shadow-lg">
                                    <span class="px-3 mx-2 text-lg font-semibold rounded" style="background-color: {{ $operationalChart['data']['datasets'][0]['backgroundColor'][$index] }}">{{ $loop->iteration }}</span>
                                    <div class="flex-1 p-3 font-semibold">
                                        {{ $item }}
                                    </div>
                                </div>
                            </td>
                            <td class="p-2">
                                <div class="w-full px-4 py-2 text-2xl font-semibold border rounded-lg shadow-lg">
                                    {{ "Rp".number_format($operationalChart['data']['datasets'][0]['data'][$index]) }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
    <div class="flex-1">
        <x-header class="mb-8 text-center">Pelaksanaan Desa Berdasarkan Klasifikasi Kegiatan</x-header>
        <div class="grid grid-cols-2 gap-5">
            @foreach ($operationalBudget->operationalTypes->split(2) as $splitIndex => $operationalSplit)
                <div>
                    <x-mary-accordion class="shadow-lg" model="group{{ $splitIndex }}">
                        @foreach ($operationalSplit as $typeIndex => $operationalType)
                            <x-mary-collapse name="collapse{{ $splitIndex.'-'.$typeIndex }}" separator>
                                <x-slot:heading class="bg-green-100">
                                    <div class="flex items-center justify-between">
                                        <span>{{ $operationalType->operational_type_name }}</span>
                                        <div class="flex items-center gap-3">
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
    </div>
</div>