<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

{{-- The navbar with `sticky` and `full-width` --}}
<x-mary-nav sticky full-width>
     
    <x-slot:brand>
        {{-- Drawer toggle for "main-drawer" --}}
        {{-- <label for="main-drawer" class="mr-3 lg:hidden">
            <x-icon name="o-bars-3" class="cursor-pointer" />
        </label> --}}

        {{-- Brand --}}
        <div>App</div>
    </x-slot:brand>

    {{-- Right side actions --}}
    <x-slot:actions>
        <x-mary-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive />
        <x-mary-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive />
        <x-mary-dropdown label="{{ Auth::user()->name }}" class="btn-ghost btn-sm">
            <x-mary-menu-item title="Logout" wire:click='logout'></x-mary-menu-item>
        </x-mary-dropdown>
    </x-slot:actions>
</x-mary-nav>