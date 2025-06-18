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
               <x-budget.operational-budget-card :$operational :$index />
            @endif
         @endforeach
      </div>

      <div class="flex flex-col gap-5">
         @foreach ($operationals as $index => $operational)
            @if ($index % 2 == 1)
               <x-budget.operational-budget-card :$operational :$index />
            @endif
         @endforeach
      </div>

   </div>
</x-dashboard-container>
