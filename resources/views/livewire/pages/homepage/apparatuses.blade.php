<div>
    <div class="w-full gap-5 carousel">
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
    </div>
</div>
