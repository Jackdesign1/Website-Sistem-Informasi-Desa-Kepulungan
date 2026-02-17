<x-dashboard-container>
   <x-mary-header title="Operasional Desa" separator progress-indicator>
      <x-slot:actions>
         <x-mary-button label="Operasional Desa" icon="tabler.plus" class="btn-primary" :link="route('dashboard.budget.operational.create')" />
      </x-slot:actions>
   </x-mary-header>

   <div class="grid grid-cols-2 gap-5">
      <div class="flex flex-col gap-5">
         @foreach ($operationals as $index => $operational)
            @if ($index % 2 == 0)
               <x-mary-card title="Operasional Desa" subtitle="Tahun: {{ $operational->year }}" shadow separator class="relative border shadow-lg">
                  <div class="absolute grid grid-cols-2 gap-1.5 right-3 top-2">
                     <x-mary-button icon="tabler.edit" :link="route('dashboard.budget.operational.edit', ['key' => Crypt::encrypt($operational->id)])" class="btn-sm btn-circle"></x-mary-button>
                     <x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data anggaran operasional tahun {{ $operational->year }}?')? $wire.delete('{{ Crypt::encrypt($operational->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
                     <span></span>
                     <x-mary-popover>
                        <x-slot:trigger>
                           <x-mary-button icon="tabler.info-circle" class="btn-sm btn-circle"></x-mary-button>
                        </x-slot:trigger>
                        <x-slot:content>
                           <span class="whitespace-nowrap">Diupload oleh: {{ $operational->user->name?? "-" }}</span>
                        </x-slot:content>
                     </x-mary-popover>
                  </div>
                  <x-mary-collapse :name="'group'.$index" separator>
                     <x-slot:heading>
                        <div class="flex items-center justify-between gap-2">
                           <span>List Operasional</span>
                           <span>Rp {{ number_format($operational->operationalDetails->sum('value'), 2) }}</span>
                        </div>
                     </x-slot:heading>
                     <x-slot:content>
                        <x-mary-accordion>
                           @foreach ($operational->operationalTypes as $indexType => $operationalType)
                              <x-mary-collapse :name="'type'.$index.$indexType" separator>
                                 <x-slot:heading>
                                    <div class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                       <span>{{ $operationalType->operational_type_name }}</span>
                                       <span>Rp{{ number_format($operationalType->details->sum('value'), 2) }}</span>
                                    </div>
                                 </x-slot:heading>
                                 <x-slot:content>
                                    <ol class="px-5 text-start">
                                       @foreach ($operationalType->details as $detail)
                                          <li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                             <span>{{ $detail->operational_detail_name }}</span>
                                             <div class="flex items-center gap-1">
                                                <span>Rp{{ number_format($detail->value, 2) }}</span>
                                                {{-- <x-mary-popover>
                                                   <x-slot:trigger>
                                                      <x-mary-icon name="tabler.info-circle"></x-mary-icon>
                                                   </x-slot:trigger>
                                                   <x-slot:content>
                                                      <span class="whitespace-nowrap">Dibuat/Diedit oleh: {{ $detail->user->name?? "-" }}</span>
                                                   </x-slot:content>
                                                </x-mary-popover> --}}
                                             </div>
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
         @foreach ($operationals as $index => $operational)
            @if ($index % 2 == 1)
               <x-mary-card title="Operasional Desa" subtitle="Tahun: {{ $operational->year }}" shadow separator class="relative border shadow-lg">
                  <div class="absolute grid grid-cols-2 gap-1.5 right-3 top-2">
                     <x-mary-button icon="tabler.edit" :link="route('dashboard.budget.operational.edit', ['key' => Crypt::encrypt($operational->id)])" class="btn-sm btn-circle"></x-mary-button>
                     <x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data anggaran operasional tahun {{ $operational->year }}?')? $wire.delete('{{ Crypt::encrypt($operational->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
                     <span></span>
                     <x-mary-popover>
                        <x-slot:trigger>
                           <x-mary-button icon="tabler.info-circle" class="btn-sm btn-circle"></x-mary-button>
                        </x-slot:trigger>
                        <x-slot:content>
                           <span class="whitespace-nowrap">Diupload oleh: {{ $operational->user->name?? "-" }}</span>
                        </x-slot:content>
                     </x-mary-popover>
                  </div>
                  <x-mary-collapse :name="'group'.$index" separator>
                     <x-slot:heading>
                        <div class="flex items-center justify-between gap-2">
                           <span>List Operasional</span>
                           <span>Rp {{ number_format($operational->operationalDetails->sum('value'), 2) }}</span>
                        </div>
                     </x-slot:heading>
                     <x-slot:content>
                        <x-mary-accordion>
                           @foreach ($operational->operationalTypes as $indexType => $operationalType)
                              <x-mary-collapse :name="'type'.$index.$indexType" separator>
                                 <x-slot:heading>
                                    <div class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                       <span>{{ $operationalType->operational_type_name }}</span>
                                       <span>Rp{{ number_format($operationalType->details->sum('value'), 2) }}</span>
                                    </div>
                                 </x-slot:heading>
                                 <x-slot:content>
                                    <ol class="px-5 text-start">
                                       @foreach ($operationalType->details as $detail)
                                          <li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
                                             <span>{{ $detail->operational_detail_name }}</span>
                                             <span>Rp{{ number_format($detail->value, 2) }}</span>
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
