@props([
   'name',
   'index'
])

<div class="absolute left-0 right-0 flex justify-between -translate-y-1/2 top-1/2">
   <a href="#{{ $name }}{{ $index - 1 }}" class="btn btn-circle">❮</a>
   <a href="#{{ $name }}{{ $index + 1 }}" class="btn btn-circle">❯</a>
</div>