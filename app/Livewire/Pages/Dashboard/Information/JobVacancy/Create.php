<?php

namespace App\Livewire\Pages\Dashboard\Information\Jobvacancy;

use App\Models\JobVacancy;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Mary\Traits\WithMediaSync;

class Create extends Component
{
    use WithFileUploads, WithMediaSync, Toast;

    #[Validate("required|max:255")]
    public $companyName;
    #[Validate("required|image|max:2048")]
    public $companyLogo;
    #[Validate("required|max:255")]
    public $contactEmail;
    #[Validate("required|max:255")]
    public $title;
    #[Validate("required|max:255")]
    public $position;
    public $expiresAt;

    public function resetPage() {
        $this->reset();
    }

    public function create() {
        $this->validate();

        try {
            // Store the uploaded company logo
            $logoPath = '/storage/'.$this->companyLogo->store('company_logos', 'public');

            // Create the JobVacancy record
            JobVacancy::create([
                'company_name' => $this->companyName,
                'company_logo' => $logoPath,
                'contact_email' => $this->contactEmail,
                'title' => $this->title,
                'position' => $this->position,
                'expires_at' => $this->expiresAt,
                'status' => 'open', // Default status
            ]);

            $this->success('Lowongan pekerjaan berhasil dibuat.');
            $this->resetPage();
            $this->dispatch('setCreateJobVacancyModal', false);
            $this->dispatch('refreshJobVacancies');
        } catch (\Exception $e) {
            $this->error('Failed to create job vacancy: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.information.job-vacancy.create');
    }
}
