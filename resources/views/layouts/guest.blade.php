<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- mary ui plugin --}}
        <link href="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

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
                        <span>Pemerintah Desa Kapulungan</span>
                        <span class="text-sm">Kabupaten Pasuruan</span>
                    </div>
                </div>
            </x-slot:brand>

            {{-- Right side actions --}}
            <x-slot:actions>
                <div class="flex gap-2">
                    <x-mary-button label="Beranda" link="{{ route('homepage') }}" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Profil Desa" link="{{ route('village-profile') }}" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Anggaran" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Informasi" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="BUMDes" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Galeri" link="###" class="text-sm btn-ghost btn-sm" responsive />
                    <x-mary-button label="Kontak" link="###" class="text-sm btn-ghost btn-sm" responsive />
                </div>
            </x-slot:actions>
        </x-mary-nav>

        {{-- The main content --}}
        <main>
            {{-- The `$slot` goes here --}}
            {{-- <x-slot:content> --}}
                {{ $slot }}
            {{-- </x-slot:content> --}}
        </main>

        {{--  TOAST area --}}
        <x-mary-toast />

        {{-- mary ui plugin --}}
        <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.js"></script>
    </body>
</html>
