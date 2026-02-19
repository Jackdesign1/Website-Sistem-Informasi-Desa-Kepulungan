<?php

namespace App\Livewire\Pages\Homepage;

use App\Models\JobVacancy;
use Livewire\Component;

class JobVacancies extends Component
{
    public function render()
    {
        return view('livewire.pages.homepage.job-vacancies', [
            'job_vacancies' => JobVacancy::latest()->limit(3)->get(),
        ]);
    }

    public function placeholder()
    {
        return '<div class="flex gap-5">
            <div class="flex flex-col flex-1 gap-4 p-4 bg-white border rounded-lg">
                <div class="flex items-center gap-4">
                    <div class="h-16 aspect-square skeleton"></div>
                    <div class="flex flex-col gap-4">
                        <div class="w-20 h-4 skeleton"></div>
                        <div class="h-4 skeleton w-28"></div>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="h-4 skeleton w-28"></div>
                    <div class="w-full h-4 skeleton"></div>
                    <div class="w-full h-4 skeleton"></div>
                </div>
            </div>
            <div class="flex flex-col flex-1 gap-4 p-4 bg-white border rounded-lg">
                <div class="flex items-center gap-4">
                    <div class="h-16 aspect-square skeleton"></div>
                    <div class="flex flex-col gap-4">
                        <div class="w-20 h-4 skeleton"></div>
                        <div class="h-4 skeleton w-28"></div>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="h-4 skeleton w-28"></div>
                    <div class="w-full h-4 skeleton"></div>
                    <div class="w-full h-4 skeleton"></div>
                </div>
            </div>
            <div class="flex flex-col flex-1 gap-4 p-4 bg-white border rounded-lg">
                <div class="flex items-center gap-4">
                    <div class="h-16 aspect-square skeleton"></div>
                    <div class="flex flex-col gap-4">
                        <div class="w-20 h-4 skeleton"></div>
                        <div class="h-4 skeleton w-28"></div>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="h-4 skeleton w-28"></div>
                    <div class="w-full h-4 skeleton"></div>
                    <div class="w-full h-4 skeleton"></div>
                </div>
            </div>
        </div>';
    }
}
