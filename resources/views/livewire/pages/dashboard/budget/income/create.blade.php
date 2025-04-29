<x-mary-form no-separator wire:submit="create">
    <x-mary-input wire:model='year' label="Tahun Pendapatan" icon="o-calendar" placeholder="2025" />

    <div class="mt-4">
        <h4 class="text-lg font-semibold">Detail Pendapatan</h4>
        @foreach ($incomes as $index => $income)
            <div class="flex flex-1 gap-3" wire:key='{{ $index }}'>
                <div class="flex-1">
                    <x-mary-input wire:model='incomes.{{ $index }}.income_name' label="Jenis Pendapatan" icon="o-tag" placeholder="Jenis Pendapatan" />
                </div>
                <div class="flex-[0.8]">
                    <x-mary-input wire:model='incomes.{{ $index }}.value' label="Nilai Pendapatan" prefix="Rp." money placeholder="Nilai Pendapatan" />
                </div>
                <div class="flex items-end">
                    <x-mary-button class="btn-warning" icon="tabler.trash" wire:click="removeDetailIncome('{{ $index }}')" spinner="removeDetailIncome('{{ $index }}')"></x-mary-button>
                </div>
            </div>
        @endforeach

        <div class="mt-3 text-center">
            <x-mary-button class="w-56 btn-success" icon="tabler.plus" wire:click="addDetailIncome" spinner="addDetailIncome"></x-mary-button>
        </div>
    </div>

    {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
    <x-slot:actions>
        <x-mary-button label="Reset" @click="$wire.resetPage" spinner="resetPage"/>
        <x-mary-button label="Tambah Data Pendapatan" icon="tabler.plus" type="submit" class="btn-primary" spinner="create" />
    </x-slot:actions>
</x-mary-form>
