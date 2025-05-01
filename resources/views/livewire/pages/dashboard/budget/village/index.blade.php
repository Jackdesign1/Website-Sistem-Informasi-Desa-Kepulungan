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
               <x-mary-card title="Pendapatan Desa ({{ $budget->year }})" subtitle="SILPA: Rp{{ number_format($budget->silpa) }}" shadow separator class="relative border shadow-lg">
                  <div class="absolute flex flex-col gap-1.5 top-1.5 right-3">
                     <x-mary-button icon="tabler.edit" :link="route('dashboard.budget.village.edit', ['key' => Crypt::encrypt($budget->id)])" class="btn-sm btn-circle"></x-mary-button>
                     <x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data pendapatan tahun {{ $budget->year }}?')? $wire.delete('{{ Crypt::encrypt($budget->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
                  </div>
                  <x-mary-collapse :name="'group'.$index" separator>
                     <x-slot:heading>
                        <div class="flex items-center justify-between gap-2">
                           <span>Pendapatan</span>
                           <span>Total: Rp {{ number_format($budget->details->sum('value'), 2) }}</span>
                        </div>
                     </x-slot:heading>
                     <x-slot:content>
                        <ol class="px-5 text-start">
                           @foreach ($budget->details as $detail)
                              <li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                 <span>{{ $detail->type }}</span>
                                 <span>Rp{{ number_format($detail->value) }}</span>
                              </li>
                           @endforeach
                        </ol>
                     </x-slot:content>
                  </x-mary-collapse>
               </x-mary-card>
            @endif
         @endforeach
      </div>

      <div class="flex flex-col gap-5">
         @foreach ($villageBudgets as $index => $budget)
            @if ($index % 2 == 1)
               <x-mary-card title="Pendapatan Desa ({{ $budget->year }})" subtitle="SILPA: Rp{{ number_format($budget->silpa) }}" shadow separator class="relative border shadow-lg">
                  <div class="absolute flex flex-col gap-1.5 top-1.5 right-3">
                     <x-mary-button icon="tabler.edit" :link="route('dashboard.budget.village.edit', ['key' => Crypt::encrypt($budget->id)])" class="btn-sm btn-circle"></x-mary-button>
                     <x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data pendapatan tahun {{ $budget->year }}?')? $wire.delete('{{ Crypt::encrypt($budget->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
                  </div>
                  <x-mary-collapse :name="'group'.$index" separator>
                     <x-slot:heading>
                        <div class="flex items-center justify-between gap-2">
                           <span>Pendapatan</span>
                           <span>Total: Rp {{ number_format($budget->details->sum('value'), 2) }}</span>
                        </div>
                     </x-slot:heading>
                     <x-slot:content>
                        <ol class="px-5 text-start">
                           @foreach ($budget->details as $detail)
                              <li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                 <span>{{ $detail->type }}</span>
                                 <span>Rp{{ number_format($detail->value, 2) }}</span>
                              </li>
                           @endforeach
                        </ol>
                     </x-slot:content>
                  </x-mary-collapse>
               </x-mary-card>
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
