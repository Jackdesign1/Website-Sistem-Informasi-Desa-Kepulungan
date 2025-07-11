<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard Desa Kepulungan</title>
        <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-desa-kapulungan.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Cropper.js --}}
        <script src="{{ asset('assets/js/cropper.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/cropper.min.css') }}" />

        {{-- Sortable.js --}}
        <script src="{{ asset('assets/js/Sortable.min.js') }}"></script>

        {{-- TinyMCE --}}
        <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

        {{-- Flatpickr  --}}
        <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">
        <script src="{{ asset('assets/js/flatpickr.js') }}"></script>

        {{--  Currency  --}}
        <script type="text/javascript" src="{{ asset('assets/js/currency.js') }}"></script>

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
                    <x-mary-menu-item title="Aparatur" icon="tabler.users" :link="route('dashboard.apparatus')" />
                    {{-- <x-mary-menu-item  :link="route('dashboard.budget')" /> --}}
                    <x-mary-menu-sub title="Anggaran" icon="hugeicons.money-exchange-03">
                        <x-mary-menu-item title="Pendapatan Desa" :link="route('dashboard.budget.village.index')" />
                        {{-- <x-mary-menu-item title="Prioritas Anggaran" :link="route('dashboard.budget.priority.index')" /> --}}
                        <x-mary-menu-item title="Operasional" :link="route('dashboard.budget.operational.index')" />
                    </x-mary-menu-sub>
                    <x-mary-menu-sub title="Informasi" icon="hugeicons.apple-news">
                        <x-mary-menu-item title="Berita" :link="route('dashboard.information.news.index')" />
                        <x-mary-menu-item title="Laporan" :link="route('dashboard.information.report.index')" />
                        <x-mary-menu-item title="Lowongan Kerja" :link="route('dashboard.information.jobs-vacancy')" />
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
        
        {{-- <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script> --}}

    </body>
</html>
