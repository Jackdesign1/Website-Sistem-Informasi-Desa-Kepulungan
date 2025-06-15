<x-dashboard-container>
    <x-mary-header class="!mb-5" title="Edit data operasional" separator progress-indicator="edit"></x-mary-header>

    <x-mary-form no-separator wire:submit="edit">
        <x-mary-input wire:model.live.debounce='year' label="Tahun Operasional" icon="o-calendar" placeholder="2025" />
        <div class="mt-4 space-y-1.5">
            @foreach ($operationalTypes as $typeIndex => $operationalType)
                <x-mary-collapse name="operational-{{ $typeIndex }}">
                    <x-slot:heading>
                        <div class="flex items-center justify-between">
                            <span>Operasional ({{ $operationalType['operational_type_name'] }})</span>
                            <span>Rp {{ number_format(array_sum(array_column($operationalType['details'], 'value')), 2) }}</span>
                        </div>
                    </x-slot:heading>
                    <x-slot:content>
                        {{-- <h4 class="text-lg font-semibold">Operasional {{ $loop->iteration }}</h4> --}}
                        <div class="flex flex-1 gap-3" wire:key='{{ $typeIndex }}'>
                            <div class="flex-1">
                                <x-mary-input wire:model.live.debounce='operationalTypes.{{ $typeIndex }}.operational_type_name' label="Jenis Operasional" icon="o-tag" placeholder="Jenis Operasional" />
                            </div>
                            <div class="flex items-end">
                                <x-mary-button 
                                    class="btn-warning" 
                                    icon="tabler.trash" 
                                    x-data 
                                    @click="if (confirm('Apakah Anda yakin ingin menghapus jenis operasional ini?')) { $wire.operationalType('{{ $typeIndex }}') }" 
                                    spinner="operationalType('{{ $typeIndex }}')">
                                </x-mary-button>
                            </div>
                        </div>
                        <div class="px-8 mt-4 border-l">
                            <h4 class="text-lg font-semibold">Detail Operasional {{ $operationalType['operational_type_name'] }}</h4>
                            @foreach ($operationalType['details'] as $detailIndex => $detail)
                                <div class="flex flex-1 gap-3" wire:key='{{ $typeIndex.$detailIndex }}'>
                                    <div class="flex-1">
                                        <x-mary-input wire:model='operationalTypes.{{ $typeIndex }}.details.{{ $detailIndex }}.operational_detail_name' label="Detail Operasional {{ $loop->iteration }}" icon="o-tag" placeholder="Detail Operasional" />
                                    </div>
                                    <div class="flex-[0.8]">
                                        <x-mary-input wire:model.live='operationalTypes.{{ $typeIndex }}.details.{{ $detailIndex }}.value' label="Nilai Operasional" prefix="Rp." money placeholder="Nilai Operasional" />
                                    </div>
                                    <div class="flex items-end">
                                        <x-mary-button 
                                            class="btn-warning" 
                                            icon="tabler.trash" 
                                            @click="if (confirm('Apakah Anda yakin ingin menghapus detail operasional ini?')) { $wire.operationalDetail('{{ $typeIndex }}', '{{ $detailIndex }}') }" 
                                            spinner="operationalDetail('{{ $typeIndex }}', '{{ $detailIndex }}')" />
                                    </div>
                                </div>
                            @endforeach
                            <x-mary-button class="w-56 mt-3 btn-success" icon="tabler.plus" wire:click="addOperationalDetail('{{ $typeIndex }}')" spinner="addOperationalDetail('{{ $typeIndex }}')"></x-mary-button>
                        </div>
                    </x-slot:content>
                </x-mary-collapse>
            @endforeach
    
            <div class="mt-3 text-center">
                <x-mary-button class="w-56 btn-success" icon="tabler.plus" wire:click="addOperationalType" spinner="addOperationalType"></x-mary-button>
            </div>
        </div>
    
        {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
        <x-slot:actions>
            <x-mary-button label="Reset" @click="$wire.resetPage" spinner="resetPage"/>
            <x-mary-button label="Ubah Data Operasional" icon="tabler.plus" type="submit" class="btn-primary" spinner="create" />
        </x-slot:actions>
    </x-mary-form>
    
</x-dashboard-c>