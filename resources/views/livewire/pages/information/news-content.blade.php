<x-container class="py-12">
    <x-mary-header :title="$data->title"/>

    <div class="flex flex-col gap-8 md:flex-row">
        <div class="flex-1 space-y-5">
            <div>
                <x-mary-carousel :slides="$images" class="!h-96"/>
                <div class="text-sm">
                    <p>Dibuat: {{ _($data->created_at->diffForHumans()) }}</p>
                </div>
            </div>
            <div class="pt-10 no-tailwindcss-base">
                {!! $data->content !!}
            </div>

            @if ($type == 'report')
            <x-mary-header title="File Laporan" />
                <div class="flex flex-wrap gap-5 pt-2">
                    @foreach ($data->fileMedia as $reportFile)
                    <div class="text-center w-28">
                        <a href="{{ asset($reportFile->url) }}" target="blank" title="{{ $reportFile->name }}">
                            <x-mary-icon name='tabler.file-description' class="w-12 h-12 mb-2"></x-mary-icon>
                        </a>
                        <a href="{{ asset($reportFile->url) }}" target="blank" class="text-sm link line-clamp-2 link-hover text-primary" title="{{ $reportFile->name }}">{{ $reportFile->name }}</a>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="flex-[.6]">
            <livewire:pages.information.rightbar />
        </div>
    </div>
</x-container>
