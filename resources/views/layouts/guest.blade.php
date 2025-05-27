<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" class="scroll-smooth">
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> --}}

        {{-- evo calendar library --}}
        <link rel="stylesheet" href="{{ asset('assets/css/evo-calendar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/evo-calendar-royal-navy.min.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" x-data="{ open: false }" x-on:scroll.window='open = false'>
        {{-- The navbar with `sticky` --}}
        <div class="relative">
            <x-mary-nav class="z-40">
                <x-slot:brand>
                    {{-- Drawer toggle for "main-drawer" --}}
                    <label for="main-drawer" class="mr-3 lg:hidden" x-on:click="open = !open">
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
                    <div class="hidden gap-2 lg:flex">
                        <x-mary-button label="Beranda" :link="route('homepage')" class="text-sm btn-ghost btn-sm" responsive />
                        <x-mary-button label="Profil Desa" :link="route('village-profile')" class="text-sm btn-ghost btn-sm" responsive />
                        <x-mary-button label="Anggaran" :link="route('budget')" class="text-sm btn-ghost btn-sm" responsive />
                        <x-mary-button label="Informasi" :link="route('information.index')" class="text-sm btn-ghost btn-sm" responsive />
                        <x-mary-button label="BUMDes" :link="route('bumdes')" class="text-sm btn-ghost btn-sm" responsive />
                        <x-mary-button label="Galeri" :link="route('galery')" class="text-sm btn-ghost btn-sm" responsive />
                        <x-mary-button label="Kontak" :link="route('contact')" class="text-sm btn-ghost btn-sm" responsive />
                        @if (Auth::check())
                            <x-mary-button label="Dashboard" :link="route('dashboard.index')" class="text-sm btn-ghost btn-sm" responsive />
                        @endif
                    </div>
                </x-slot:actions>
            </x-mary-nav>
            <div class="absolute left-0 right-0 z-40 flex flex-col gap-2 overflow-hidden transition-all bg-white top-full lg:hidden" :class="open? 'max-h-screen shadow-lg' : 'max-h-0'" x-cloak>
                <x-mary-button x-on:click="open = false" label="Beranda" :link="route('homepage')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Profil Desa" :link="route('village-profile')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Anggaran" :link="route('budget')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Informasi" :link="route('information.index')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="BUMDes" :link="route('bumdes')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Galeri" :link="route('galery')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Kontak" :link="route('contact')" class="btn-ghost"/>
                @if (Auth::check())
                    <x-mary-button x-on:click="open = false" label="Dashboard" :link="route('dashboard.index')" class="btn-ghost"/>
                @endif
            </div>
        </div>

        {{-- The main content --}}
        <main x-on:click="open = false">
            {{ $slot }}
        </main>

        @if (!request()->routeIs('login'))
            <x-container class="!max-w-[100rem] ">
                <livewire:layouts.footer />
            </x-container>
        @endif

        {{--  TOAST area --}}
        <x-mary-toast />

        {{-- mary ui plugin --}}
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/evo-calendar.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.js"></script>

        @stack('scripts')
    </body>
</html>
