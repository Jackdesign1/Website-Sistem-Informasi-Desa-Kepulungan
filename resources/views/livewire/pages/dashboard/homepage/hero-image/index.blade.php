<x-dashboard-container>
    <x-mary-modal wire:model="createModalState" box-class="max-w-4xl">
        <livewire:pages.dashboard.homepage.hero-image.create wire:key="{{ $heroImages->count() }}"/>
    </x-mary-modal>
    <x-mary-modal wire:model="editModalState" box-class="max-w-4xl">
        <livewire:pages.dashboard.homepage.hero-image.edit wire:key="{{ $editKey }}"/>
    </x-mary-modal>

    <x-mary-modal wire:model='deleteModalState' title="Ubah Status Artikel">
        Anda yakin ingin menghapus gambar ini?
        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.deleteModalState = false" />
            <x-mary-button label="Hapus" wire:click="delete()" spinner="delete" class=" btn-warning" />
        </x-slot:actions>
    </x-mary-modal>

    <x-mary-header title="Slider Hero Homepage" progress-indicator separator />

    <div class="px-5 space-y-5" x-data="heroImage">
        <h2 class="text-xl font-semibold">Preview</h2>
        <div id="hero-image" x-init="initHeroImage" x-cloak wire:key='{{ now() }}'>
            @forelse ($heroImages as $heroImage)
                <div class="relative overflow-hidden border shadow-lg rounded-xl">
                    <div class="absolute top-0 bottom-0 left-0 right-0 z-10 bg-black/40"></div>
                    <img
                        src="{{ asset($heroImage->image) }}"
                        class="object-cover w-full " />
                    <div class="absolute top-0 bottom-0 z-20 flex justify-center left-5 right-5 md:justify-start">
                        <div class="absolute z-20 text-lg text-center text-white bottom-14 max-w-96 lg:left-16 md:text-left">
                            <p class="font-semibold md:text-3xl">{{ $heroImage->title }}</p>
                            <p>{{ $heroImage->subtitle }}</p>
                            @if ($heroImage->button_text && $heroImage->button_url)
                                <x-mary-button class="mt-3 btn-primary" :label="$heroImage->button_text" external :link="$heroImage->button_url"/>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="grid bg-gray-200 rounded-lg shadow-lg h-96 place-content-center place-items-center">
                    <p class="text-gray-500">Tidak ada gambar tersedia</p>
                </div>
            @endforelse
        </div>

        <div class="mt-3">
            <h2 class="text-xl font-semibold">Gambar Tersedia</h2>
            <div class="h-40" id="hero-image-nav" x-cloak x-init="initHeroImageNav" wire:key='{{ now() }}'>
                @foreach ($heroImages as $heroImage)
                    <div class="px-2">
                        <div class="relative overflow-hidden border rounded-lg shadow-lg">
                            <div class="absolute top-0 bottom-0 left-0 right-0 z-10 bg-black/40"></div>
                            <img src="{{ asset($heroImage->image) }}" class="object-cover w-full h-40"/>
                            <div class="absolute z-30 flex items-center justify-between left-2 right-2 top-2">
                                <x-mary-badge :value="$loop->iteration"  />
                                <div class="flex gap-1">
                                    <x-mary-button icon="tabler.edit" class="btn-circle btn-warning btn-sm" wire:click="dispatch('initEditHeroImage', {'key': '{{ Crypt::encrypt($heroImage->id) }}'}); $wire.editModalState = true"/>
                                    <x-mary-button icon="o-trash" class="btn-circle btn-error btn-sm" wire:click="selectedKey = '{{ Crypt::encrypt($heroImage->id) }}'; $wire.deleteModalState = true"/>
                                </div>
                            </div>
                            <div class="absolute top-0 bottom-0 z-20 left-3 right-3">
                                <div class="absolute z-20 text-center text-white bottom-5 max-w-96 lg:left-5 md:text-left">
                                    {{ $heroImage->title }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="px-2">
                    <div class="grid h-40 bg-gray-200 rounded-lg shadow-lg cursor-pointer place-items-center" wire:click="createModalState = true">
                        <x-mary-button icon="tabler.plus" class="btn-circle" wire:click="createModalState = true"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-container>

@script
    <script>
        Alpine.data('heroImage', () => {
            return {
                initHeroImage: () => {
                    $('#hero-image').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        fade: true,
                        infinite: false,
                        adaptiveHeight: true,
                        dynamicHeight: true,
                        asNavFor: '#hero-image-nav',
                    });
                },
                initHeroImageNav: () => {
                    $('#hero-image-nav').slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        centerPadding: '20px',
                        dots: true,
                        focusOnSelect: true,
                        asNavFor: '#hero-image',
                        infinite: false,
                        responsive: [
                            {
                                breakpoint: 500,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                    arrows: false,
                                }
                            },
                        ]
                    });
                }
            }
        })

        document.addEventListener('livewire:navigating', () => {
            $('#hero-image').slick('unslick');
            $('#hero-image-nav').slick('unslick');
        })
    </script>
@endscript
