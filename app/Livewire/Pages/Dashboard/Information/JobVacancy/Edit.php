<?php

namespace App\Livewire\Pages\Dashboard\Information\Jobvacancy;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\JobVacancy;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;
use Livewire\Attributes\Validate;

class Edit extends Component
{
    use WithFileUploads, WithMediaSync, Toast;
    #[Validate("required|max:255")]
    public $companyName;
    public $oldCompanyLogo;
    public $newCompanyLogo;
    #[Validate("required|max:255")]
    public $contactEmail;
    #[Validate("required|max:255")]
    public $title;
    #[Validate("required|max:255")]
    public $position;
    public $expiresAt;

    public $key;

    public function rules() {
        $rules = [];
        if ($this->newCompanyLogo) {
            $rules['newCompanyLogo'] = 'image|max:2048';
        }
        return $rules;
    }

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
            $newLogoPath = null;
            if ($this->newCompanyLogo) {
                $newLogoPath = '/storage/'.$this->newCompanyLogo->store('company_logos', 'public');
            }

            $data = [
                'company_name' => $this->companyName,
                'contact_email' => $this->contactEmail,
                'title' => $this->title,
                'position' => $this->position,
                'expires_at' => $this->expiresAt,
                'status' => 'open',
            ];

            if ($newLogoPath) {
                $data['company_logo'] = $newLogoPath;
            }

            JobVacancy::find(decrypt($this->key))->update($data);

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
