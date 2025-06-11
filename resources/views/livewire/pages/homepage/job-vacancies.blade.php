<div class="grid grid-cols-1 gap-3 md:grid-cols-2">
    @foreach ($job_vacancies as $job)
        <x-information.job-vacancy.card :job="$job" class="flex-1"/>
    @endforeach
</div>