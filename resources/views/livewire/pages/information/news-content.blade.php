<x-container class="py-12">
    <x-mary-header :title="$data->title"/>

    <div class="flex flex-col gap-8 md:flex-row">
        <div class="flex-1 space-y-5">
            <div>
                <x-mary-carousel :slides="$images" class="!h-96 mb-3"/>
                <x-mary-avatar :placeholder="getInitials($data->user->name?? '-')" :title="$data->user->name?? '-'" :subtitle="$data->created_at->diffForHumans()" class="!w-11" />

                {{-- <div class="text-sm">
                    <p>Dibuat: {{ _($data->created_at->diffForHumans()) }}</p>
                </div> --}}
            </div>

            <style>
                #tinymce_content img {
                    display: inline-block;
                }
            </style>
            <div class="pt-10" id="tinymce_content">
                {{-- <x-mary-editor wire:model="content" :config="['content_css' => asset('assets/css/tinymce_content.css')]" /> --}}
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

@pushOnce('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
@endPushOnce