<x-dashboard-container>
    <x-mary-header title="Ubah Prioritas Anggaran" separator progress-indicator="edit"></x-mary-header>
    <x-mary-form no-separator wire:submit="edit">
        <x-mary-input wire:model='year' label="Tahun Prioritas Anggaran" icon="o-calendar" placeholder="2025" />
    
        <div class="mt-4">
            <h4 class="text-lg font-semibold">Detail Prioritas Anggaran</h4>
            @foreach ($detailBudgetPriorities as $index => $detail)
                <div class="flex flex-1 gap-3" wire:key='{{ $index }}'>
                    <div class="flex-1">
                        <x-mary-input wire:model='detailBudgetPriorities.{{ $index }}.priority_name' label="Nama Anggaran" icon="o-tag" placeholder="Nama Anggaran" />
                    </div>
                    <div class="flex-[0.8]">
                        <x-mary-input wire:model='detailBudgetPriorities.{{ $index }}.value' label="Nilai Anggaran" prefix="Rp." money placeholder="Nilai Anggaran"/>
                    </div>
                    <div class="flex items-end">
                        <x-mary-button class="btn-warning" icon="tabler.trash" wire:click="removeDetailBudget('{{ $index }}')" spinner="removeDetailBudget('{{ $index }}')"></x-mary-button>
                    </div>
                </div>
            @endforeach
    
            <div class="mt-3 text-center">
                <x-mary-button class="w-56 btn-success" icon="tabler.plus" wire:click="addDetailBudget" spinner="addDetailBudget"></x-mary-button>
            </div>
        </div>
    
        {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
        <x-slot:actions>
            <x-mary-button label="Reset" @click="$wire.resetPage" spinner="resetPage"/>
            <x-mary-button label="Ubah Prioritas Anggaran" icon="tabler.plus" type="submit" class="btn-primary" spinner="edit" />
        </x-slot:actions>
    </x-mary-form>    
</x-dashboard-container>