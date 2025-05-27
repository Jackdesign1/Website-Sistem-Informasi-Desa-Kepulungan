 {{-- The navbar with `sticky` --}}
        <x-mary-nav sticky class="z-40">
            <x-slot:brand>
                {{-- Drawer toggle for "main-drawer" --}}
                <label for="main-drawer" class="mr-3 lg:hidden">
                    <x-mary-icon name="o-bars-3" class="cursor-pointer" />
                </label>

                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/logo-desa-kapulungan.png') }}" alt="logo desa kapulungan" class="h-14">
                    <div class="flex flex-col font-semibold">
                        <span>Pemerintah Desa Kepulungan</span>
                        <span class="text-sm">Kabupaten Pasuruan</span>
                    </div>
                </div>
            </x-slot:brand>

            {{-- Right side actions --}}
            <x-slot:actions>
                <div class="flex gap-2">
                    <x-mary-button label="Beranda" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Profil Desa" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Anggaran" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Informasi" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="BUMDes" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Galeri" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Kontak" link="###" class="text-sm btn-ghost btn-sm" responsive />
                </div>
            </x-slot:actions>
        </x-mary-nav>