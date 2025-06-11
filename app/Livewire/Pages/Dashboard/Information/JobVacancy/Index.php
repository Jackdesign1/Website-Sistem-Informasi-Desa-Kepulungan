<?php

namespace App\Livewire\Pages\Dashboard\Information\JobVacancy;

use App\Models\JobVacancy;
use Carbon\Carbon;
use Livewire\Component;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast;

    public $createJobVacancyModalState = false;
    public $editJobVacancyModalState = false;
    public $statusModalState = false;
    public $deleteModalState = false;

    public $expiresAt;

    public $listeners = [
        'setCreateJobVacancyModal' => 'setCreateJobVacancyModal',
        'refreshJobVacancies' => '$refresh',
    ];

    public function setCreateJobVacancyModal($status) {
        $this->createJobVacancyModalState = $status;
    }

    public function changeStatus($selectedKey)
    {
        try {
            $jobVacancy = JobVacancy::find(decrypt($selectedKey));
            $newStatus = $jobVacancy->status == "closed"? "open" : "closed";
            if ($this->expiresAt) {
                $jobVacancy->expires_at = $this->expiresAt;
            } else {
                if ($jobVacancy->expires_at < now() && $newStatus == 'open') {
                    $jobVacancy->expires_at = null;
                }
            }
            $jobVacancy->status = $newStatus;
            $jobVacancy->save();
            $this->success($newStatus == 'open'? 'Status Pekerjaan Dibuka Kembali' : 'Status Pekerjaan Telah Ditutup');
            $this->statusModalState = false;
        } catch (\Exception $e) {
            $this->error("Error mengubah status", "Terjadi kesalahan saat mengubah status pekerjaan.");
        }
    }

    public function delete($selectedKey) {
        JobVacancy::find(decrypt($selectedKey))->delete();
        $this->success('Lowongan pekerjaan berhasil dihapus');
        $this->deleteModalState = false;
    }

    public function render()
    {
        return view('livewire.pages.dashboard.information.job-vacancy.index', [
            'job_vacancies' => JobVacancy::latest()->get(),
        ]);
    }
}
