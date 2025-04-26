<x-mary-form no-separator>
    <x-mary-input label="Name" icon="o-user" placeholder="The full name" />
    <x-mary-input label="Email" icon="o-envelope" placeholder="The e-mail" />

    {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
    <x-slot:actions>
        <x-mary-button label="Cancel" @click="$wire.$parent.createModal = false" />
        <x-mary-button label="Confirm" class="btn-primary" />
    </x-slot:actions>
</x-mary-form>
