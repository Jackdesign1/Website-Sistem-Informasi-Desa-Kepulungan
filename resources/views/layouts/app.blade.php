<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title?? 'Dashboard Desa Kepulungan' }}</title>
        <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-desa-kapulungan.png') }}">

        @assets
            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            {{-- Cropper.js --}}
            <link rel="stylesheet" href="{{ asset('assets/css/cropper.min.css') }}" />
            {{-- Flatpickr  --}}
            <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">
            {{-- slick js --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}"/>
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}"/>
            {{-- evo calendar library --}}
            <link rel="stylesheet" href="{{ asset('assets/css/evo-calendar.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/evo-calendar-royal-navy.min.css') }}">
        @endassets

        <style>
            .crop-false button[data-tip="false"] {
                display: none !important;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" x-data>
        {{-- @livewire('layouts.dashboard-navigation') --}}

        <x-mary-nav sticky class="lg:hidden">
            <x-slot:brand>
                <div class="pt-2 ml-5">{{ $title?? 'Dashboard Desa Kepulungan' }}</div>
            </x-slot:brand>
            <x-slot:actions>
                <label for="main-drawer" class="mr-3 lg:hidden">
                    <x-mary-icon name="o-bars-3" class="cursor-pointer" />
                </label>
            </x-slot:actions>
        </x-mary-nav>

        {{-- The main content with `full-width` --}}
        <x-mary-main full-width>

            {{-- This is a sidebar that works also as a drawer on small screens --}}
            {{-- Notice the `main-drawer` reference here --}}
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">
                {{-- User --}}
                @if(Auth::check())
                    <livewire:layouts.logout>
                    <x-mary-menu-separator />
                @endif

                {{-- Activates the menu item when a route matches the `link` property --}}
                <x-mary-menu activate-by-route>
                    <x-mary-menu-item title="Home" icon="o-home" link="###" />
                    <x-mary-menu-item title="Hero Image" icon="tabler.photos" :link="route('dashboard.hero-image.index')" />
                    <x-mary-menu-item title="Aparatur" icon="tabler.users" :link="route('dashboard.apparatus')" />
                    <x-mary-menu-item title="Kalender Desa" icon="tabler.calendar" :link="route('dashboard.village-calendar.index')" />
                    {{-- <x-mary-menu-item  :link="route('dashboard.budget')" /> --}}
                    <x-mary-menu-sub title="Anggaran" icon="hugeicons.money-exchange-03">
                        <x-mary-menu-item title="Pendapatan Desa" :link="route('dashboard.budget.village.index')" />
                        {{-- <x-mary-menu-item title="Prioritas Anggaran" :link="route('dashboard.budget.priority.index')" /> --}}
                        <x-mary-menu-item title="Operasional" :link="route('dashboard.budget.operational.index')" />
                    </x-mary-menu-sub>
                    <x-mary-menu-sub title="Informasi" icon="hugeicons.apple-news">
                        <x-mary-menu-item title="Berita" :link="route('dashboard.information.news.index')" />
                        <x-mary-menu-item title="Laporan" :link="route('dashboard.information.report.index')" />
                        <x-mary-menu-item title="Lowongan Kerja" :link="route('dashboard.information.jobs-vacancy.index')" />
                    </x-mary-menu-sub>
                    {{-- <x-mary-menu-item title="Galeri" icon="tabler.box-multiple-filled" link="###" /> --}}
                </x-mary-menu>
            </x-slot:sidebar>

            {{-- The `$slot` goes here --}}
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>
        </x-mary-main>

        {{--  TOAST area --}}
        <x-mary-toast />

        @assets
            {{-- <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script> --}}
            <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
            {{-- Flatpickr  --}}
            <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
            {{-- Sortable.js --}}
            <script src="{{ asset('assets/js/Sortable.min.js') }}"></script>
            {{-- TinyMCE --}}
            <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
            {{-- Cropper.js --}}
            <script src="{{ asset('assets/js/cropper.min.js') }}"></script>
            {{-- slick js library --}}
            <script type="text/javascript" src="{{ asset('assets/js/slick.min.js') }}"></script>
            {{--  Currency  --}}
            <script type="text/javascript" src="{{ asset('assets/js/currency.js') }}"></script>
            {{-- evo calendar library --}}
            <script src="{{ asset('assets/js/evo-calendar.min.js') }}"></script>
            {{-- Date.js library --}}
            <script type="text/javascript" src="{{ asset('assets/js/date.js') }}"></script>
        @endassets

        @stack('scripts')
    </body>
</html>
