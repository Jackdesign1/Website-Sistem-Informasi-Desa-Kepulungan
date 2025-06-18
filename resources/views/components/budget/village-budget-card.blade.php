@props(['budget', 'index'])

<x-mary-card title="Pendapatan Desa ({{ $budget->year }})" subtitle="SILPA: Rp{{ number_format($budget->silpa, 2) }}" shadow separator class="relative border shadow-lg">
    <div class="absolute flex flex-col gap-1.5 top-1.5 right-3">
        <x-mary-button icon="tabler.edit" :link="route('dashboard.budget.village.edit', ['key' => Crypt::encrypt($budget->id)])" class="btn-sm btn-circle"></x-mary-button>
        <x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data pendapatan tahun {{ $budget->year }}?')? $wire.delete('{{ Crypt::encrypt($budget->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
    </div>
    <x-mary-collapse :name="'group'.$index" separator>
        <x-slot:heading>
        <div class="flex items-center justify-between gap-2">
            <span>Pendapatan</span>
            <span>Total: Rp {{ number_format($budget->details->sum('value'), 2) }}</span>
        </div>
        </x-slot:heading>
        <x-slot:content>
        <ol class="px-5 text-start">
            @foreach ($budget->details as $detail)
                <li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                    <span>{{ $detail->type }}</span>
                    <span>Rp{{ number_format($detail->value, 2) }}</span>
                </li>
            @endforeach
        </ol>
        </x-slot:content>
    </x-mary-collapse>
</x-mary-card>
