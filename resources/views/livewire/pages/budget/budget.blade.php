<div class="flex items-center gap-8">
    @if ($withChart) 
        <div class="flex-[.75] text-center">
            <x-header class="mb-5 text-center">Anggaran Desa</x-header>
            <div class="flex justify-center">
                <x-mary-chart wire:model="budgetChart" class="w-full max-w-xl"/>
            </div>
        </div>
    @endif
    <div class="flex-1">
        <x-mary-select class="mb-5 !w-fit" :options="$years" option-label="label" option-value="year" wire:model='selectedYear' label="Tahun Anggaran" placeholder="Pilih Tahun" icon="o-calendar">
        </x-mary-select>
        <div class="w-full border shadow-lg stats rounded-xl {{ $withChart? 'stats-vertical' : '' }}">
            <div class="stat">
                <div class="stat-figure text-dark">
                    <x-tabler-chart-arrows class="w-7 h-7"/>
                </div>
                <div class="stat-title">APBDes 2025 Pembelanjaan</div>
                <div class="stat-value text-dark">Rp1.000.500,300</div>
                <div class="stat-desc">21% more than previous</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-dark">
                    <x-tabler-file-text class="w-7 h-7"/>
                </div>
                <div class="stat-title">APBDes 2025 Pelaksanaan</div>
                <div class="stat-value text-dark">Rp1.000.500,300</div>
                <div class="stat-desc">21% more than previous</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-dark">
                    <x-iconpark-incomeone-o class="w-7 h-7"/>
                </div>
                <div class="stat-title">APBDes 2025 Pendapatan</div>
                <div class="stat-value text-dark">Rp1.000.500,300</div>
                <div class="stat-desc">21% more than previous</div>
            </div>
        </div>
    </div>
</div>
