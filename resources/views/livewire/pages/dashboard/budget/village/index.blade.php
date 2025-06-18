<x-dashboard-container>
   <x-mary-modal wire:model="createModal" title="Buat Pendapatan Desa" box-class="max-w-3xl">
      <livewire:pages.dashboard.budget.village.create />
   </x-mary-modal>

   <x-mary-header title="Pendapatan Desa" separator progress-indicator>
      <x-slot:actions>
         <x-mary-button label="Pendapatan Desa" icon="tabler.plus" class="btn-primary" @click="$wire.createModal = true" />
      </x-slot:actions>
   </x-mary-header>

   <div class="grid grid-cols-2 gap-5">
      <div class="flex flex-col gap-5">
         @foreach ($villageBudgets as $index => $budget)
            @if ($index % 2 == 0)
               <x-budget.village-budget-card :budget="$budget" :index="$index"/>
            @endif
         @endforeach
      </div>

      <div class="flex flex-col gap-5">
         @foreach ($villageBudgets as $index => $budget)
            @if ($index % 2 == 1)
               <x-budget.village-budget-card :budget="$budget" :index="$index"/>
            @endif
         @endforeach
      </div>

   </div>
</x-dashboard-container>



      {{-- <div class="flex flex-col gap-5">
         @foreach ($villageBudgets[0] as $index => $budget)
            <x-mary-card title="Pendapatan Desa Tahun: {{ date('Y', strtotime($budget->year)) }}" subtitle="SILPA: Rp{{ number_format($budget->silpa) }}" shadow separator class="border shadow-lg">
               <x-mary-collapse :name="'group'.$index" separator>
                  <x-slot:heading>
                     <span>Detail Pendapatan</span>
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
         @endforeach
      </div>
      <div class="flex flex-col gap-5">
         @foreach ($villageBudgets[1] as $index => $budget)
            <x-mary-card title="Pendapatan Desa Tahun: {{ date('Y', strtotime($budget->year)) }}" subtitle="SILPA: Rp{{ number_format($budget->silpa) }}" shadow separator class="border shadow-lg">
               <x-mary-collapse :name="'group'.$index" separator>
                  <x-slot:heading>
                     <span>Detail Pendapatan</span>
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
         @endforeach
      </div> --}}
