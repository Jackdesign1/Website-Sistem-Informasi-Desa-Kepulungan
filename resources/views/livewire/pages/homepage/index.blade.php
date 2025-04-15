<div class="space-y-40">
    <x-carousel></x-carousel>

    <x-container class="flex items-center gap-16">
        <div class="flex-shrink">
            <img src="{{ asset('assets/images/kepala-desa.png') }}" alt="" class="object-cover w-full h-full rounded-lg aspect-square max-w-96">
        </div>
        <div class="flex-1">
            <x-header>Sambutan Kepala Desa</x-header>
            <h4 class="text-2xl font-semibold">Muhammad Zaky S.H.,M.H</h4>
            <p class="mt-4"><span class="font-semibold">Assalamualaikum Wr. Wb.</span> <br> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint </p>
        </div>
    </x-container>
    <x-container class="flex items-center gap-16">
        <div class="flex-1 space-y-4">
            <x-header>Profil Desa Kapulungan</x-header>
            <p>incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
            <x-mary-button class="btn btn-primary" link="profil-desa"  label="Lebih Detail"/>
        </div>
        <div class="flex-[.8]">
            <img src="{{ asset('assets/images/profil-desa.png') }}" alt="" class="object-cover w-full h-full rounded-lg aspect-video">
        </div>
    </x-container>

    <x-container>
        <x-header class="mb-8">Aparatur Desa</x-header>
        <div class="w-full gap-8 carousel rounded-box">
            @for ($i = 0; $i < 8; $i++)
                <div class="carousel-item">
                    <x-mary-card title="Muhammad Zaky S.H.,M.H" class="!max-w-60 border !shadow-lg">
                        <div>
                            <div>Kepala Desa</div>
                            <div>NIPD: 123172312641237</div>
                        </div>
                        <x-slot:figure>
                            <img src="{{ asset('assets/images/kepala-desa.png') }}"/>
                        </x-slot:figure>
                    </x-mary-card>
                </div>
            @endfor
        </div>
    </x-container>

    <x-container>
        <x-header class="mb-8">Anggaran Desa</x-header>
        <div class="carousel-item w-full gap-8">
            <div class="stats shadow-xl w-full border">
                <div class="stat">
                    <div class="stat-figure text-dark">
                        <x-mary-icon name="tab.x-tabler-chart-arrows"></x-mary-icon>
                    </div>
                    <div class="stat-title">Total Likes</div>
                    <div class="stat-value text-dark">Rp1.000.500,300</div>
                    <div class="stat-desc">21% more than previous</div>
                </div>
                
                <div class="stat">
                    <div class="stat-figure text-dark">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Page Views</div>
                    <div class="stat-value text-dark">Rp1.000.500,300</div>
                    <div class="stat-desc">21% more than previous</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-dark">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Page Views</div>
                    <div class="stat-value text-dark">Rp1.000.500,300</div>
                    <div class="stat-desc">21% more than previous</div>
                </div>
        </div>
    </x-container>


</div>
