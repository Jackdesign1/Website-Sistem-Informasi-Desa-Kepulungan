<div>
    <div class="w-full gap-5 carousel">
        @if ($apparatuses->count() > 0)
            @foreach ($apparatuses as $apparatus)
                <div class="carousel-item">
                    <x-mary-card :title="$apparatus->name" class="!max-w-60 border !shadow-lg rounded-xl">
                        <div>
                            <div>{{ $apparatus->position }}</div>
                            <div class="text-sm">NIPD: {{ $apparatus->nipd }}</div>
                        </div>
                        <x-slot:figure>
                            <img src="{{ $apparatus->image? asset($apparatus->image) : asset('assets/icons/blank-user-profile.png') }}" class="object-cover aspect-square"/>
                        </x-slot:figure>
                    </x-mary-card>
                </div>
            @endforeach
        @else
            <div class="flex items-center justify-center w-full h-full">
                <x-mary-card title="Perangkat Desa" subtitle="Belum ada Perangkat Desa yang ditampilkan" class="w-full max-w-sm" />
            </div>
        @endif
    </div>
</div>
