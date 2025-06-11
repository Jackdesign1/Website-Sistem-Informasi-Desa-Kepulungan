<?php

namespace App\Livewire\Pages\Dashboard\Information\Jobvacancy;

use App\Models\JobVacancy;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Mary\Traits\WithMediaSync;

class Edit extends Component
{
    use WithFileUploads, WithMediaSync, Toast;
    #[Validate("required|max:255")]
    public $companyName;
    public $oldCompanyLogo;
    #[Validate("image|max:2048")]
    public $newCompanyLogo;
    #[Validate("required|max:255")]
    public $contactEmail;
    #[Validate("required|max:255")]
    public $title;
    #[Validate("required|max:255")]
    public $position;
    public $expiresAt;

    public $key;

    public function resetPage() {
        $this->reset();
    }

    #[On('initEditJobVacancy')]
    public function initEditJobVacancy($key)
    {
        $jobVacancy = JobVacancy::findOrFail(decrypt($key));
        $this->key = $key;
        $this->companyName = $jobVacancy->company_name;
        $this->oldCompanyLogo = $jobVacancy->company_logo; // Assuming this is a file upload
        $this->contactEmail = $jobVacancy->contact_email;
        $this->title = $jobVacancy->title;
        $this->position = $jobVacancy->position;
        $this->expiresAt = $jobVacancy->expires_at;
    }

    public function edit() {
        $this->validate();

        try {
            if ($this->newCompanyLogo) {
                $newLogoPath = '/storage/'.$this->newCompanyLogo->store('company_logos', 'public');
            }

            JobVacancy::find(decrypt($this->key))->update([
                'company_name' => $this->companyName,
                'company_logo' => $newLogoPath,
                'contact_email' => $this->contactEmail,
                'title' => $this->title,
                'position' => $this->position,
                'expires_at' => $this->expiresAt,
                'status' => 'open',
            ]);

            $this->success('Lowongan pekerjaan berhasil diedit.');
            $this->dispatch('setEditJobVacancyModal', false);
            $this->dispatch('refreshJobVacancies');
        } catch (\Exception $e) {
            $this->error('Gagal mengubah lowongan pekerjaan. Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.information.job-vacancy.edit');
    }
}
