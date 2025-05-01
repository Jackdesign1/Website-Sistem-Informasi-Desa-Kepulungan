<?php

namespace App\Livewire\Pages\Homepage;

use App\Models\News;
use Livewire\Component;

class Reports extends Component
{
    public function reports() {
        return News::onlyReport()
            ->onlyPublish()
            ->latest('updated_at')
            ->take(3)
            ->with('media')
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.homepage.reports', [
            'reports' => $this->reports()
        ]);
    }

    public function placeholder() {
        return '<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <div class="w-full shadow-sm card rounded-xl bg-base-100 image-full">
                <div class="card-body">
                    <div class="h-8 skeleton card-title"></div>
                    <div class="h-6 skeleton"></div>
                    <div class="justify-end card-actions">
                        <x-mary-button class="btn-outline btn-sm" label="Baca Selengkapnya"/>
                    </div>
                </div>
            </div>
            <div class="w-full shadow-sm card rounded-xl bg-base-100 image-full">
                <div class="card-body">
                    <div class="h-8 skeleton card-title"></div>
                    <div class="h-6 skeleton"></div>
                    <div class="justify-end card-actions">
                        <x-mary-button class="btn-outline btn-sm" label="Baca Selengkapnya"/>
                    </div>
                </div>
            </div>
            <div class="w-full shadow-sm card rounded-xl bg-base-100 image-full">
                <div class="card-body">
                    <div class="h-8 skeleton card-title"></div>
                    <div class="h-6 skeleton"></div>
                    <div class="justify-end card-actions">
                        <x-mary-button class="btn-outline btn-sm" label="Baca Selengkapnya"/>
                    </div>
                </div>
            </div>
        </div>';
    }
}
