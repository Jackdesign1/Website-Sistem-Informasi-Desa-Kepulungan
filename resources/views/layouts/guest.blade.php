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
    <body class="font-sans antialiased">
        {{-- The navbar with `sticky` --}}
        <div x-data="{ open: false }" class="relative">
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
                    </div>
                </x-slot:actions>
            </x-mary-nav>
            <div class="absolute left-0 right-0 z-40 flex flex-col gap-2 overflow-hidden transition-all bg-white top-full lg:hidden" :class="open? 'max-h-screen' : 'max-h-0'" x-cloak>
                <x-mary-button x-on:click="open = false" label="Beranda" :link="route('homepage')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Profil Desa" :link="route('village-profile')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Anggaran" :link="route('budget')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Informasi" :link="route('information.index')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="BUMDes" :link="route('bumdes')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Galeri" :link="route('galery')" class="btn-ghost"/>
                <x-mary-button x-on:click="open = false" label="Kontak" :link="route('contact')" class="btn-ghost"/>
            </div>
        </div>

        {{-- The main content --}}
        <main>
            {{ $slot }}
        </main>

        <x-container class="!max-w-[100rem]">
            <div class="px-6 mx-auto">
                <div class="flex flex-col items-center justify-between md:flex-row">
                    <!-- Logo and Title -->
                    <div class="flex items-center mb-4 md:mb-0">
                        <div class="">
                            <img src="{{ asset('assets/images/logo-desa-kapulungan.png') }}">
                        </div>
                        <div>
                            <h1 class="text-lg font-bold text-gray-800">Pemerintah Desa Kepulungan</h1>
                            <p class="text-gray-600">Kabupaten Pasuruan</p>
                        </div>
                    </div>
                    <!-- Contact Info -->
                    <div class="text-right">
                        <p class="text-gray-600">Kantor Desa Kepulungan</p>
                        <p class="text-gray-600">Kepulungan - Gempol jl. surabaya malang, </p>
                        <p class="text-gray-600">Kabupaten Pasuruan, Jawa Timur 67155, Indonesia.</p>
                        <div class="flex justify-end mt-1 space-x-2">
                            <a href="#" class="text-[#003087]"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-[#003087]"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="text-[#003087]"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-[#003087]"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-4">
                    <!-- Tentang -->
                    <div>
                        <h3 class="mb-1 font-semibold text-gray-800">Lorem</h3>
                        <ul class="space-y-0.5">
                            <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>

                        </ul>
                    </div>
                    <!-- Fasilitas -->
                    <div>
                        <h3 class="mb-1 font-semibold text-gray-800">Lorem</h3>
                        <ul class="space-y-0.5">
                            <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>
                            </ul>
                    </div>
                    <!-- Layanan -->
                    <div>
                        <h3 class="mb-1 font-semibold text-gray-800">Lorem</h3>
                        <ul class="space-y-0.5">
                            <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>

                        </ul>
                    </div>
                    <!-- Informasi Umum -->
                    <div>
                        <h3 class="mb-1 font-semibold text-gray-800">Lorem</h3>
                        <ul class="space-y-0.5">
                            <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>

                        </ul>
                    </div>
                </nav>
            </div>

            <footer class="py-2 mt-4 bg-white border-t border-gray-200">
                <div class="container px-6 mx-auto text-center">
                    <p class="text-gray-600">Program Studi Teknik Informatika PSDKU Sidoarjo</p>
                    <p class="text-gray-600">Politeknik Negeri Jember © Copyright 2025</p>
                </div>
            </footer>
        </x-container>

        {{--  TOAST area --}}
        <x-mary-toast />

        {{-- mary ui plugin --}}
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/evo-calendar.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.js"></script>

        @stack('scripts')
    </body>
</html>
