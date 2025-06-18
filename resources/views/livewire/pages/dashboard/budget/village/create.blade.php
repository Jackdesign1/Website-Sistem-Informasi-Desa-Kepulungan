<x-mary-form no-separator wire:submit="create">
    <div class="flex flex-col sm:gap-3 sm:flex-row">
        <div class="flex-1">
            <x-mary-input wire:model='year' label="Tahun Pendapatan Anggaran" icon="o-calendar" placeholder="2025" />
        </div>
        <div class="flex-1">
            <x-mary-input wire:model='silpa' label="SILPA" prefix="Rp." money placeholder="Nilai Silpa" />
        </div>
    </div>

    <div class="mt-4">
        <h4 class="text-lg font-semibold">Detail Pendapatan</h4>
        <div class="space-y-2">
            @foreach ($detailBudgets as $index => $detail)
                <div class="flex flex-1 gap-3 px-3 pb-4 border-b md:border-b-0 md:pb-0 last:border-b-0" wire:key='{{ $index }}'>
                    <div class="flex flex-col flex-1 md:gap-3 md:flex-row">
                        <div class="flex-1">
                            <x-mary-input wire:model='detailBudgets.{{ $index }}.type' label="Jenis Pendapatan" icon="o-tag" placeholder="Jenis Pendapatan" />
                        </div>
                        <div class="flex-[0.8]">
                            <x-mary-input wire:model='detailBudgets.{{ $index }}.value' label="Nilai Pendapatan" prefix="Rp." money placeholder="Nilai Pendapatan" />
                        </div>
                    </div>
                    <div class="flex items-end justify-center mt-3 md:mt-0">
                        <x-mary-button class="btn-warning" icon="tabler.trash" wire:click="removeDetailBudget('{{ $index }}')" spinner="removeDetailBudget('{{ $index }}')"></x-mary-button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3 text-center">
            <x-mary-button class="w-56 btn-success" icon="tabler.plus" wire:click="addDetailBudget" spinner="addDetailBudget"></x-mary-button>
        </div>
    </div>

    {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
    <x-slot:actions>
        <x-mary-button label="Reset" @click="$wire.resetPage" spinner="resetPage"/>
        <x-mary-button label="Tambah Data Pendapatan" icon="tabler.plus" type="submit" class="btn-primary" spinner="create" />
    </x-slot:actions>
</x-mary-form>
