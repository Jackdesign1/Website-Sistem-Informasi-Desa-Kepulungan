<div class="flex items-center gap-8">
    @if ($withChart) 
        <div class="flex-[.75] text-center flex justify-center items-center flex-col">
            <x-mary-chart wire:model="budgetChart" class="w-full max-w-xl"/>
        </div>
    @endif

    <div class="flex-1">
        @if ($withChart)
            <x-header class="mb-5">Anggaran Desa</x-header>
        @endif
        <div class="w-full border shadow-lg stats rounded-xl stats-vertical md:stats-horizontal {{ $withChart? 'stats-vertical' : '' }}">
            <div class="stat">
                @if ($withChart)
                    <div class="stat-figure text-dark">
                        <x-mary-button class="bg-[#FF6384] btn-sm" link="#pembelanjaan" icon="o-arrow-right"></x-mary-button>
                    </div>
                @endif
                <div class="stat-title">APBDes {{ $year }} Silpa</div>
                <div class="stat-value text-dark text-ellipsis">Rp {{ number_format($silpa, 0) }}</div>
                {{-- <div class="stat-desc">21% more than previous</div> --}}
            </div>
            <div class="stat">
                @if ($withChart)
                    <div class="stat-figure text-dark">
                        <x-mary-button class="bg-[#36A2EB] btn-sm" link="#pelaksanaan" icon="o-arrow-right"></x-mary-button>
                    </div>
                @endif
                <div class="stat-title">APBDes {{ $year }} Pelaksanaan</div>
                <div class="stat-value text-dark text-ellipsis">Rp {{ number_format($operationalBudget, 0) }}</div>
                {{-- <div class="stat-desc">21% more than previous</div> --}}
            </div>
            <div class="stat">
                @if ($withChart)
                    <div class="stat-figure text-dark">
                        <x-mary-button class="bg-[#4BC0C0] btn-sm" link="#pendapatan" icon="o-arrow-right"></x-mary-button>
                    </div>
                @endif
                <div class="stat-title">APBDes {{ $year }} Pendapatan</div>
                <div class="stat-value text-dark text-ellipsis">Rp {{ number_format($villageBudget, 0) }}</div>
                {{-- <div class="stat-desc">21% more than previous</div> --}}
            </div>
        </div>
    </div>
</div>
