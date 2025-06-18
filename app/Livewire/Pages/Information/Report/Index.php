<?php

namespace App\Livewire\Pages\Information\Report;

use App\Models\News;
use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination, Toast;

    public function placeholder() {
        return view('livewire.pages.information.content-placeholder');
    }

    public function render()
    {
        $reports = News::onlyReport()->with('imageMedia', 'fileMedia')->latest()->paginate(10, pageName: 'page');
        $reportChunks = [[], []];
        foreach ($reports as $i => $item) {
            $reportChunks[$i % 2][] = $item;
        }
        return view('livewire.pages.information.report.index', [
            'reportChunks' => $reportChunks,
            'reports' => $reports,
        ]);
    }
}
