<div>
    @if ($news->isNotEmpty() && $reports->isNotEmpty())
        <livewire:pages.information.hero-section :news="$news" :reports="$reports" lazy wire:key='{{ now() }}'/>
    @endif
    <x-container class="py-8">
        <div class="flex flex-col gap-8 pt-24 md:flex-row" id="news-content">
            <div class="flex-1">
                {{-- bellow has bug where if u press alt + <-, it wont show the page --}}
                <x-mary-tabs wire:model="selectedTab" class="py-3" wire:key='{{ now() }}'>
                    <x-mary-tab name="news" label="Berita">
                        <div>
                            <livewire:pages.information.news.index lazy/>
                        </div>
                    </x-mary-tab>
                    <x-mary-tab name="report" label="Laporan">
                        <div>
                            <livewire:pages.information.report.index lazy/>
                        </div>
                    </x-mary-tab>
                    {{-- <x-mary-tab name="jobs" label="Lowongan Kerja">
                        <div>
                            <livewire:pages.information.job-vacancy.index lazy/>
                        </div>
                    </x-mary-tab> --}}
                </x-mary-tabs>
            </div>
            <div class="flex-[.5]">
                <livewire:pages.information.rightbar lazy/>
            </div>
        </div>
    </x-container>
</div>