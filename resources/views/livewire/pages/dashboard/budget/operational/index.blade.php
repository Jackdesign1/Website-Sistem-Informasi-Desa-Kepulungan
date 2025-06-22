<x-dashboard-container>
   <x-mary-header title="Operasional Desa" separator progress-indicator>
      <x-slot:actions>
         <x-mary-button label="Operasional Desa" icon="tabler.plus" class="btn-primary" :link="route('dashboard.budget.operational.create')" />
      </x-slot:actions>
   </x-mary-header>

    {{-- desktop layout --}}
    <div class="hidden grid-cols-1 gap-5 md:grid md:grid-cols-2">
        @foreach ($chunkedOperationals as $operationalsChunk)
            <div class="flex flex-col gap-5">
                @foreach ($operationalsChunk as $index => $operational)
                    <x-budget.operational-budget-card :$operational :$index />
                @endforeach
            </div>
        @endforeach
    </div>

    {{-- mobile layout --}}
    <div class="grid grid-cols-1 gap-5 md:hidden md:grid-cols-2">
        @foreach ($operationals as $index => $operational)
            <x-budget.operational-budget-card :$operational :$index />
        @endforeach
    </div>

</x-dashboard-container>
