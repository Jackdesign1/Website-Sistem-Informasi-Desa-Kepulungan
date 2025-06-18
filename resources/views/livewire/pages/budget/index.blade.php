<div class="py-20 space-y-40" x-data >
    <x-container class="flex items-center justify-between gap-8">
        <div class="flex-1">
            <img src="{{ asset('assets/icons/transparancy-budget.png') }}" alt="" class="mx-auto mb-5 w-60 md:hidden">

            <div class="max-w-sm mx-auto text-xl text-center md:ms-auto md:me-0 md:text-end">
                <x-header class="mb-3">
                    Transparansi Anggaran <br>Desa Kepulungan
                </x-header>
                Komitmen Kami untuk Keterbukaan dan Akuntabilitas dalam Pengelolaan Anggaran
            </div>
        </div>
        <div class="flex-[.8] ps-8 hidden md:block">
            <img src="{{ asset('assets/icons/transparancy-budget.png') }}" alt="" class="w-60">
        </div>
    </x-container>

    <x-container>
        <div class="w-64 mx-auto">
            <x-mary-select class="mb-5" :options="$years" option-label="label" option-value="year" wire:model.live='selectedYear' label="Pilih Tahun Anggaran" placeholder="Pilih Tahun" icon="o-calendar"></x-mary-select>
        </div>
        <livewire:pages.budget.budget :year="$selectedYear" withChart="true" wire:key='{{ $selectedYear }}'/>
    </x-container>

    <x-container id="pelaksanaan">
        <livewire:pages.budget.operational :year="$selectedYear" withChart="true" wire:key='{{ $selectedYear }}'/>
    </x-container>

    {{-- <x-container id="pendapatan">
        <x-header class="mb-8 text-center">Pendapatan Desa</x-header>
        <livewire:pages.budget.income :year="$selectedYear" withChart="true" wire:key='{{ $selectedYear }}'/>
    </x-container> --}}
</div>


{{-- <div class="grid items-center grid-cols-2 gap-5">
    <div class="flex items-center border rounded-lg">
        <span class="px-5 text-lg">1</span>
        <div class="flex-1 p-3">
            {{ $item }}
        </div>
    </div>
    <span class="px-3 py-2 text-2xl font-semibold border rounded-lg">{{ "Rp".number_format($belanjaChart['data']['datasets'][0]['data'][$index]) }}</span>
</div> --}}
