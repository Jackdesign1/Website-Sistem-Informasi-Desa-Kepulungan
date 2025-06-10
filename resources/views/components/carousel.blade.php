@props([
   'overlay' => false,
])

<div {{ $attributes->merge(['class' => 'relative']) }}>
   @if ($overlay)
      <div class="absolute top-0 bottom-0 left-0 right-0 z-10 bg-gradient bg-gradient-to-tr from-black/40 to-black/10"></div>
   @endif
   <div class="w-full h-full carousel">
      {{ $slot }}
   </div>
</div>