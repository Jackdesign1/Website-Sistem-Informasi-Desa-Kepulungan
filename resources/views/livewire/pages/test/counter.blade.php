<?php
    use Livewire\Volt\Component;
    use function Livewire\Volt\{state};

    state([
        'counter'
    ]);

    $addCounter = fn() => $this->counter++;
?>

<div>
    <div>Counter : {{ $counter }}</div>
    <x-mary-button label="counter" wire:click='addCounter'></x-mary-button>
</div>