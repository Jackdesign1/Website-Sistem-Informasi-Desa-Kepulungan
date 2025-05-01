<div class="grid grid-cols-2 gap-5">
    @foreach ($operationalBudget->operationalTypes->split(2) as $splitIndex => $operationalSplit)
        <div>
            <x-mary-accordion class="shadow-lg" model="group{{ $splitIndex }}">
                @foreach ($operationalSplit as $typeIndex => $operationalType)
                    <x-mary-collapse name="collapse{{ $splitIndex.'-'.$typeIndex }}" separator>
                        <x-slot:heading class="bg-green-100">
                            <div class="flex items-center justify-between">
                                <span>{{ $operationalType->operational_type_name }}</span>
                                <div class="flex items-center gap-3">
                                    <span>Rp {{ number_format($operationalType->details->sum('value'), 2) }}</span>
                                    <x-mary-badge value="45%" class="badge-soft" />
                                </div>
                            </div>
                        </x-slot:heading>
                        <x-slot:content>
                            <ol class="px-5 list-decimal text-start">
                                @foreach ($operationalType->details as $detail)
                                    <li class="flex justify-between gap-2 py-1 border-b last:border-b-0">
                                        <span>{{ $detail->operational_detail_name }}</span>
                                        <span>Rp{{ number_format($detail->value, 2) }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        </x-slot:content>
                    </x-mary-collapse>
                @endforeach
            </x-mary-accordion>
        </div>
    @endforeach
</div>