<div class="space-y-3">
    @forelse ($job_vacancies as $job)
        <x-information.job-vacancy.card :job="$job" class="flex-1"/>
    @empty
        <div class="flex items-center justify-center w-full h-96">
            <div class="text-center">
                <x-mary-icon name="tabler.alert-triangle" class="mb-3 text-gray-400 size-10"/>
                <p class="text-gray-500">Tidak ada lowongan kerja yang tersedia saat ini.</p>
            </div>
        </div>
    @endforelse
</div>
