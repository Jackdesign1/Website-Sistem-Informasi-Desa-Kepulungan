<x-dashboard-container>
   <x-mary-modal wire:model="createModal" title="Buat Pendapatan Desa" box-class="max-w-3xl">
      <livewire:pages.dashboard.budget.income.create />
   </x-mary-modal>

   <x-mary-header title="Pendapatan Desa" separator progress-indicator>
      <x-slot:actions>
         <x-mary-button label="Pendapatan Desa" icon="tabler.plus" class="btn-primary" @click="$wire.createModal = true" />
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
                        <span>Detail Pendapatan</span>
                     </x-slot:heading>
                     <x-slot:content>
                        <ol class="px-5 text-start">
                           @foreach ($income->details as $detail)
                              <li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                 <span>{{ $detail->income_name }}</span>
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
         @foreach ($incomes as $index => $income)
            @if ($index % 2 == 1)
               <x-mary-card title="Pendapatan Desa" subtitle="Tahun: {{ $income->year }}" shadow separator class="relative border shadow-lg">
                  <div class="absolute flex flex-col gap-1.5 top-1.5 right-3">
                     <x-mary-button icon="tabler.edit" :link="route('dashboard.budget.income.edit', ['key' => Crypt::encrypt($income->id)])" class="btn-sm btn-circle"></x-mary-button>
                     <x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data anggaran tahun {{ $income->year }}?')? $wire.delete('{{ Crypt::encrypt($income->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
                  </div>
                  <x-mary-collapse :name="'group'.$index" separator>
                     <x-slot:heading>
                        <span>Detail Pendapatan</span>
                     </x-slot:heading>
                     <x-slot:content>
                        <ol class="px-5 text-start">
                           @foreach ($income->details as $detail)
                              <li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                 <span>{{ $detail->income_name }}</span>
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



   </div>
</x-dashboard-container>