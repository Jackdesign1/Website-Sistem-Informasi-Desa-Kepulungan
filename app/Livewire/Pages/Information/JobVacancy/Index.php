<?php

namespace App\Livewire\Pages\Information\JobVacancy;

use Livewire\Component;
use App\Models\JobVacancy;

class Index extends Component
{
    public function placeholder() {
        return view('livewire.pages.information.job-vacancy.placeholder');
    }

    public function render()
    {
        return view('livewire.pages.information.job-vacancy.index', [
            'job_vacancies' => JobVacancy::latest()->get(),
        ]);
    }
}
