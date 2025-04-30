<x-dashboard-container>
    <x-mary-header class="!mb-5" title="Tambah data pendapatan" separator progress-indicator="create"></x-mary-header>

    <x-mary-form no-separator wire:submit="create">    
        <x-mary-input wire:model.live.debounce='year' label="Tahun Pendapatan" icon="o-calendar" placeholder="2025" />
        <div class="mt-4 space-y-1.5">
            @foreach ($incomeTypes as $typeIndex => $incomeType)
                <x-mary-collapse name="income-{{ $typeIndex }}">
                    <x-slot:heading>
                        <div class="flex items-center justify-between">
                            <span>Pendapatan ({{ $incomeType['income_type_name'] }})</span>
                            <span>Rp {{ number_format(array_sum(array_column($incomeType['details'], 'value'))) }}</span>
                        </div>
                    </x-slot:heading>
                    <x-slot:content>
                        {{-- <h4 class="text-lg font-semibold">Pendapatan {{ $loop->iteration }}</h4> --}}
                        <div class="flex flex-1 gap-3" wire:key='{{ $typeIndex }}'>
                            <div class="flex-1">
                                <x-mary-input wire:model.live.debounce='incomeTypes.{{ $typeIndex }}.income_type_name' label="Jenis Pendapatan" icon="o-tag" placeholder="Jenis Pendapatan" />
                            </div>
                            <div class="flex items-end">
                                <x-mary-button class="btn-warning" icon="tabler.trash" wire:click="removeIncomeType('{{ $typeIndex }}')" spinner="removeIncomeType('{{ $typeIndex }}')"></x-mary-button>
                            </div>
                        </div>
                        <div class="px-8 mt-4 border-l">
                            <h4 class="text-lg font-semibold">Detail Pendapatan {{ $incomeType['income_type_name'] }}</h4>
                            @foreach ($incomeType['details'] as $detailIndex => $detail)
                                <div class="flex flex-1 gap-3" wire:key='{{ $typeIndex.$detailIndex }}'>
                                    <div class="flex-1">
                                        <x-mary-input wire:model='incomeTypes.{{ $typeIndex }}.details.{{ $detailIndex }}.income_detail_name' label="Detail Pendapatan {{ $loop->iteration }}" icon="o-tag" placeholder="Detail Pendapatan" />
                                    </div>
                                    <div class="flex-[0.8]">
                                        <x-mary-input wire:model.live='incomeTypes.{{ $typeIndex }}.details.{{ $detailIndex }}.value' label="Nilai Pendapatan" prefix="Rp." money placeholder="Nilai Pendapatan" />
                                    </div>
                                    <div class="flex items-end">
                                        <x-mary-button class="btn-warning" icon="tabler.trash" wire:click="removeIncomeDetail('{{ $typeIndex }}', '{{ $detailIndex }}')" spinner="removeIncomeDetail('{{ $typeIndex }}', '{{ $detailIndex }}')"></x-mary-button>
                                    </div>
                                </div>
                            @endforeach
                            <x-mary-button class="w-56 mt-3 btn-success" icon="tabler.plus" wire:click="addIncomeDetail('{{ $typeIndex }}')" spinner="addIncomeDetail('{{ $typeIndex }}')"></x-mary-button>
                        </div>
                    </x-slot:content>
                </x-mary-collapse>
            @endforeach
    
            <div class="mt-3 text-center">
                <x-mary-button class="w-56 btn-success" icon="tabler.plus" wire:click="addIncomeType" spinner="addIncomeType"></x-mary-button>
            </div>
        </div>
    
        {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
        <x-slot:actions>
            <x-mary-button label="Reset" @click="$wire.resetPage" spinner="resetPage"/>
            <x-mary-button label="Tambah Data Pendapatan" icon="tabler.plus" type="submit" class="btn-primary" spinner="create" />
        </x-slot:actions>
    </x-mary-form>
    
</x-dashboard-container>