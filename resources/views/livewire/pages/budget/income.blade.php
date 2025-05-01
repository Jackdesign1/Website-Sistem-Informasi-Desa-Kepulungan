<div class="flex items-center justify-center">
    <div class="justify-center flex-1">
        <x-mary-chart wire:model="villageBudgetChart" class="w-full max-w-md"/>
    </div>
    <div class="flex-1">
        <table>
            @foreach ($villageBudgetChart['data']['labels'] as $index => $item)
                <tr>
                    <td class="w-full p-2">
                        <div class="flex items-center overflow-hidden border rounded-lg shadow-lg">
                            <span class="px-3 mx-2 text-lg font-semibold rounded" style="background-color: {{ $villageBudgetChart['data']['datasets'][0]['backgroundColor'][$index] }}">{{ $loop->iteration }}</span>
                            <div class="flex-1 p-3 font-semibold">
                                {{ $item }}
                            </div>
                        </div>
                    </td>
                    <td class="p-2">
                        <div class="w-full px-4 py-2 text-2xl font-semibold border rounded-lg shadow-lg">
                            {{ "Rp".number_format($villageBudgetChart['data']['datasets'][0]['data'][$index]) }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>