<x-dashboard-container>
	<x-mary-modal wire:model="createModal" title="Buat Anggaran Prioritas" box-class="max-w-3xl">
		<livewire:pages.dashboard.budget.priority.create />
	</x-mary-modal>

	<x-mary-header title="Anggaran Desa" separator progress-indicator>
		<x-slot:actions>
			<x-mary-button label="Anggaran Prioritas" icon="tabler.plus" class="btn-primary" @click="$wire.createModal = true" />
		</x-slot:actions>
	</x-mary-header>

	<div class="grid grid-cols-2 gap-5">
		<div class="flex flex-col gap-5">
			@foreach ($budgetPriorities as $index => $budgetPriority)
				@if ($index % 2 == 0)
					<x-mary-card title="Anggaran Prioritas Desa" subtitle="Tahun: {{ $budgetPriority->year }}" shadow separator class="relative border shadow-lg">
						<div class="absolute flex flex-col gap-1.5 top-1.5 right-3">
							<x-mary-button icon="tabler.edit" :link="route('dashboard.budget.priority.edit', ['key' => Crypt::encrypt($budgetPriority->id)])" class="btn-sm btn-circle"></x-mary-button>
							<x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data anggaran prioritas tahun {{ $budgetPriority->year }}?')? $wire.delete('{{ Crypt::encrypt($budgetPriority->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
						</div>
						<x-mary-collapse :name="'group'.$index" separator>
							<x-slot:heading>
								<span>Detail Anggaran</span>
							</x-slot:heading>
							<x-slot:content>
								<ol class="px-5 text-start">
									@foreach ($budgetPriority->details as $detail)
										<li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
											<span>{{ $detail->priority_name }}</span>
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
			@foreach ($budgetPriorities as $index => $budgetPriority)
				@if ($index % 2 == 1)
					<x-mary-card title="Anggaran Prioritas Desa" subtitle="Tahun: {{ $budgetPriority->year }}" shadow separator class="relative border shadow-lg">
						<div class="absolute flex flex-col gap-1.5 top-1.5 right-3">
							<x-mary-button icon="tabler.edit" :link="route('dashboard.budget.priority.edit', ['key' => Crypt::encrypt($budgetPriority->id)])" class="btn-sm btn-circle"></x-mary-button>
							<x-mary-button icon="tabler.trash" @click="confirm('Anda yakin ingin menghapus data anggaran prioritas tahun {{ $budgetPriority->year }}?')? $wire.delete('{{ Crypt::encrypt($budgetPriority->id) }}') : ''" class="btn-sm btn-circle"></x-mary-button>
						</div>
						<x-mary-collapse :name="'group'.$index" separator>
							<x-slot:heading>
								<span>Detail Anggaran</span>
							</x-slot:heading>
							<x-slot:content>
								<ol class="px-5 text-start">
									@foreach ($budgetPriority->details as $detail)
										<li class="flex items-center justify-between gap-2 py-1 border-b last:border-b-0">
											<span>{{ $detail->priority_name }}</span>
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