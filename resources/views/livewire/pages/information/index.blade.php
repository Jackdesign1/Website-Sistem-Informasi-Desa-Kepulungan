<x-container class="py-8">
    <div class="flex gap-5">
        <div class="flex-1">
            <div class="w-full shadow card rounded-xl bg-base-100 h-full image-full aspect-[5/4]">
                <figure>
                    <img
                    src="{{ asset('assets/images/berita1.png') }}"
                    class="object-cover w-full"
                    alt="berita1" />
                </figure>
                <div class="card-body">
                    <h2 class="text-2xl card-title">Bupati Pasuruan Resmikan Wisata Wong Pulungan</h2>
                    <p>Update 26 Maret 2024</p>
                    <div class="justify-end card-actions">
                    <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 gap-5">
            <div class="flex-1">
                <div class="w-full shadow h-full card rounded-xl bg-base-100 image-full aspect-[2/1]">
                    <figure>
                        <img
                        src="{{ asset('assets/images/berita1.png') }}"
                        class="object-cover w-full"
                        alt="berita1" />
                    </figure>
                    <div class="card-body">
                        <h2 class="text-xl card-title">Bupati Pasuruan Resmikan Wisata Wong Pulungan</h2>
                        <p>Update 26 Maret 2024</p>
                        <div class="justify-end card-actions">
                        <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-1 gap-5">
                <div class="flex-1">
                    <div class="w-full shadow card rounded-xl bg-base-100 image-full aspect-[2/1]">
                        <figure>
                            <img
                            src="{{ asset('assets/images/berita1.png') }}"
                            class="object-cover w-full"
                            alt="berita1" />
                        </figure>
                        <div class="card-body">
                            <h2 class="text-xl card-title">Bupati Pasuruan Resmikan Wisata Wong Pulungan</h2>
                            <p>Update 26 Maret 2024</p>
                            <div class="justify-end card-actions">
                            <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="w-full shadow card rounded-xl bg-base-100 image-full aspect-[2/1]">
                        <figure>
                            <img
                            src="{{ asset('assets/images/berita1.png') }}"
                            class="object-cover w-full"
                            alt="berita1" />
                        </figure>
                        <div class="card-body">
                            <h2 class="text-xl card-title">Bupati Pasuruan Resmikan Wisata Wong Pulungan</h2>
                            <p>Update 26 Maret 2024</p>
                            <div class="justify-end card-actions">
                            <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex gap-8 pt-24" id="news-content">
        <div class="flex-1">
            {{-- <div class="tabs tabs-lift">
                <input type="radio" name="my_tabs_3" class="tab" aria-label="Tab 1" />
                <div class="p-6 tab-content bg-base-100 border-base-300">
                    <livewire:pages.information.news.index lazy/>
                </div>
                <input type="radio" name="my_tabs_3" class="tab" aria-label="Tab 2" checked="checked" />
                <div class="p-6 tab-content bg-base-100 border-base-300">
                    <livewire:pages.information.report.index lazy/>
                </div>
                <input type="radio" name="my_tabs_3" class="tab" aria-label="Tab 3" />
                <div class="p-6 tab-content bg-base-100 border-base-300">
                    <livewire:pages.information.job-vacancy.index lazy/>
                </div>
            </div> --}}

            {{-- bellow has bug where if u press alt + <-, it wont show the page --}}
            <x-mary-tabs wire:model="selectedTab" class="py-3">
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
                <x-mary-tab name="jobs" label="Lowongan Kerja">
                    <div>
                        <livewire:pages.information.job-vacancy.index lazy/>
                    </div>
                </x-mary-tab>
            </x-mary-tabs>
        </div>
        <div class="flex-[.5]">
            <livewire:pages.information.rightbar />
        </div>
    </div>
</x-container>
