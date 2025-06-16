<div>
    <x-mary-modal wire:model="createModal">
        <livewire:pages.dashboard.apparatus.create wire:key='{{ $apparatuses->count() }}'/>
    </x-mary-modal>

    <x-mary-modal wire:model="editModal">
        <livewire:pages.dashboard.apparatus.edit />
    </x-mary-modal>

    <x-dashboard-container>
        <x-mary-header title="Aparatur" progress-indicator separator>
            <x-slot:actions>
                <x-mary-button label="Tambah" icon="tabler.user-plus" class="btn-primary" @click="$wire.createModal = true"/>
            </x-slot:actions>
        </x-mary-header>
        <x-dashboard-container>
            @php
                $headers = [
                    ['key' => "id", 'label' => "#"],
                    ['key' => "image", 'label' => "Image"],
                    ['key' => "name", 'label' => "Name"],
                    ['key' => "position", 'label' => "Jabatan"],
                    ['key' => "nipd", 'label' => "NIPD"],
                ]
            @endphp

            <x-mary-table :headers="$headers" :rows="$apparatuses" with-pagination>
                @scope('cell_id', $apparatus, $apparatuses)
                    <x-number-indicator :data="$apparatuses" :loop="$loop->iteration"></x-number-indicator>
                @endscope
                @scope('cell_image', $apparatus)
                    <img src="{{ asset($apparatus->image) }}" alt="Foto Aparatur Desa" class="object-cover w-20 rounded-lg min-w-20 aspect-square">
                @endscope
                @scope('actions', $apparatus)
                    <div class="flex gap-3">
                        <x-mary-button icon="hugeicons.pencil-edit-02" class="btn-success btn-circle"
                            @click="
                                $wire.editModal = true;
                                $wire.dispatch('initEditApparatus', {key:'{{ Crypt::encrypt($apparatus->id) }}'})
                            "/>
                        <x-mary-button icon="hugeicons.delete-02" class="btn-warning btn-circle"/>
                    </div>
                @endscope

                <x-slot:empty>
                    Data Tidak Ditemukan
                </x-slot:empty>
            </x-mary-table>
        </x-dashboard-container>
    </x-dashboard-container>
</div>

@pushOnce('scripts')
    @script
        <script>
            console.log('test')
        </script>
    @endscript
@endPushOnce
