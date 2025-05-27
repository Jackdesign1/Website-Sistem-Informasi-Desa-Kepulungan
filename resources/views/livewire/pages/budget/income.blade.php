<div class="flex flex-col items-center justify-center gap-5 md:flex-row md:gap-0">
    <div class="flex-1">
        <x-mary-chart wire:model="villageBudgetChart" class="w-full max-w-md"/>
    </div>
    <div class="flex-1">
        <table>
            @if ($villageBudgetChart)
                @foreach ($villageBudgetChart['data']['labels'] as $index => $item)
                    <tr>
                        <td class="w-full p-2">
                            <div class="flex items-center overflow-hidden border rounded-lg shadow-lg">
                                <span class="px-3 mx-2 text-base font-semibold rounded md:text-lg" style="background-color: {{ $villageBudgetChart['data']['datasets'][0]['backgroundColor'][$index] }}">{{ $loop->iteration }}</span>
                                <div class="flex-1 p-3 text-sm font-semibold md:text-base">
                                    {{ $item }}
                                </div>
                            </div>
                        </td>
                        <td class="p-2">
                            <div class="w-full px-4 py-2 text-base font-semibold border rounded-lg shadow-lg md:text-2xl whitespace-nowrap">
                                {{ "Rp".number_format($villageBudgetChart['data']['datasets'][0]['data'][$index]) }}
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