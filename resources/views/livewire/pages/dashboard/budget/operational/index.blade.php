<x-dashboard-container>
   <x-mary-header title="Pendapatan Desa" separator progress-indicator>
      <x-slot:actions>
         <x-mary-button label="Pendapatan Desa" icon="tabler.plus" class="btn-primary" :link="route('dashboard.budget.income.create')" />
      </x-slot:actions>
   </x-mary-header>

   <div class="grid grid-cols-2 gap-5">
      <div class="flex flex-col gap-5">
         @foreach ($incomes as $index => $income)
            @if ($index % 2 == 0)
               <x-mary-card title="Pendapatan Desa" subtitle="Tahun: {{ $income->year }}" shadow separator class="relative border shadow-lg">
                  <div class="absolute flex flex-col gap-1.5 top-1.5 right-3">
                     <x-mary-button icon="tabler.edit" :link="route('dashboard.budget.income.edit', ['key' => Crypt::encrypt($income->id)])" class="btn-sm btn-circle"></x-mary-button>
                     <x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data anggaran tahun {{ $income->year }}?')? $wire.delete('{{ Crypt::encrypt($income->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
                  </div>
                  <x-mary-collapse :name="'group'.$index" separator>
                     <x-slot:heading>
                        <div class="flex items-center justify-between gap-2">
                           <span>List Pendapatan</span>
                           <span>Rp {{ number_format($income->incomeDetails->sum('value')) }}</span>
                        </div>
                     </x-slot:heading>
                     <x-slot:content>
                        <x-mary-accordion>
                           @foreach ($income->incomeTypes as $indexType => $incomeType)
                              <x-mary-collapse :name="'type'.$index.$indexType" separator>
                                 <x-slot:heading>
                                    <div class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                       <span>{{ $incomeType->income_type_name }}</span>
                                       <span>Rp{{ number_format($incomeType->details->sum('value')) }}</span>
                                    </div>
                                 </x-slot:heading>
                                 <x-slot:content>
                                    <ol class="px-5 text-start">
                                       @foreach ($incomeType->details as $detail)
                                          <li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                             <span>{{ $detail->income_detail_name }}</span>
                                             <span>Rp{{ number_format($detail->value) }}</span>
                                          </li>
                                       @endforeach
                                    </ol>
                                 </x-slot:content>
                              </x-mary-collapse>
                           @endforeach
                        </x-mary-accordion>
                     </x-slot:content>
                  </x-mary-collapse>
               </x-mary-card>
            @endif
         @endforeach
      </div>
      
      <div class="flex flex-col gap-5">
         @foreach ($incomes as $index => $income)
            @if ($index % 2 == 1)
               <x-mary-card title="Pendapatan Desa" subtitle="Tahun: {{ $income->year }}" shadow separator class="relative border shadow-lg">
                  <div class="absolute flex flex-col gap-1.5 top-1.5 right-3">
                     <x-mary-button icon="tabler.edit" :link="route('dashboard.budget.income.edit', ['key' => Crypt::encrypt($income->id)])" class="btn-sm btn-circle"></x-mary-button>
                     <x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data anggaran tahun {{ $income->year }}?')? $wire.delete('{{ Crypt::encrypt($income->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
                  </div>
                  <x-mary-collapse :name="'group'.$index" separator>
                     <x-slot:heading>
                        <div class="flex items-center justify-between gap-2">
                           <span>List Pendapatan</span>
                           <span>Rp {{ number_format($income->incomeDetails->sum('value')) }}</span>
                        </div>
                     </x-slot:heading>
                     <x-slot:content>
                        <x-mary-accordion>
                           @foreach ($income->incomeTypes as $indexType => $incomeType)
                              <x-mary-collapse :name="'type'.$index.$indexType" separator>
                                 <x-slot:heading>
                                    <div class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                       <span>{{ $incomeType->income_type_name }}</span>
                                       <span>Rp{{ number_format($incomeType->details->sum('value')) }}</span>
                                    </div>
                                 </x-slot:heading>
                                 <x-slot:content>
                                    <ol class="px-5 text-start">
                                       @foreach ($incomeType->details as $detail)
                                          <li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                             <span>{{ $detail->income_detail_name }}</span>
                                             <span>Rp{{ number_format($detail->value) }}</span>
                                          </li>
                                       @endforeach
                                    </ol>
                                 </x-slot:content>
                              </x-mary-collapse>
                           @endforeach
                        </x-mary-accordion>
                     </x-slot:content>
                  </x-mary-collapse>
               </x-mary-card>
            @endif
         @endforeach
      </div>

   </div>
</x-dashboard-container>