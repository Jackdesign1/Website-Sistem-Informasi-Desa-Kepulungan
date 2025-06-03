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

<span>
    <x-mary-list-item :item="Auth::user()" value="name" sub-value="email" no-separator no-hover class="pt-2" :link="route('profile')">
        <x-slot:actions>
            <x-mary-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logout" no-wire-navigate wire:click='logout' />
        </x-slot:actions>
    </x-mary-list-item>
</span>