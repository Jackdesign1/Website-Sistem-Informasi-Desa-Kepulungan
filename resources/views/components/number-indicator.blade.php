@props([
    'data',
    'loop'
])

<span {{ $attributes->merge(['class' => 'text-lg']) }}>
    {{ ($data->currentPage() - 1) * $data->perPage() + $loop }}
</span>
