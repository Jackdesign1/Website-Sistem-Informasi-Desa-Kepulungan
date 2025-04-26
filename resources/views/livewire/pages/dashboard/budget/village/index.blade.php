<x-dashboard-container>
   <x-mary-modal wire:model="createModal" title="Tambah Data Anggaran">
      <livewire:pages.dashboard.budget.village.create />
  </x-mary-modal>

   <x-mary-header title="Anggaran Desa" separator progress-indicator>
      <x-slot:actions>
         <x-mary-button label="Tambah Anggaran" icon="tabler.plus" class="btn-primary" @click="$wire.createModal = true" />
      </x-slot:actions>
   </x-mary-header>

   <div class="grid grid-cols-2 gap-5">
      @foreach ($village_budgets as $index => $budget)
         <div>
            <x-mary-card title="Anggaran Desa Tahun: {{ date('Y', strtotime($budget->year)) }}" subtitle="SILPA: Rp{{ number_format($budget->silpa) }}" shadow separator class="border shadow-lg">
               <x-mary-collapse :name="'group'.$index" separator>
                  <x-slot:heading>
                     <span>Detail Anggaran</span>
                  </x-slot:heading>
                  <x-slot:content>
                     <ol class="px-5 text-start">
                        @foreach ($budget->detail as $detail)
                           <li class="flex items-center justify-between py-1">
                              <span>{{ $detail->type }}</span>
                              <span>Rp{{ number_format($detail->value) }}</span>
                           </li>
                        @endforeach
                     </ol>
                  </x-slot:content>
               </x-mary-collapse>
            </x-mary-card>
         </div>
      @endforeach
   </div>
</x-dashboard-container>
