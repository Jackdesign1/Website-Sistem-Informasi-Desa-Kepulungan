<x-mary-collapse :name="'detail-0'" separator>
    <x-slot:heading>
    <div class="flex flex-col flex-wrap gap-2 py-1 border-b sm:items-center sm:justify-between sm:flex-row last:border-b-0">
        <span>Nama Program</span>
        <span>-</span>
    </div>
    </x-slot:heading>
    <x-slot:content>
    <ol class="px-5 text-start">
        <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
            <span>Nama Program</span>
            <span>-</span>
        </li>
        <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
            <span>Status</span>
            <span>-</span>
        </li>
        <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
            <span>Anggaran</span>
            <span>-</span>
        </li>
        <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
            <span>Tanggal Mulai</span>
            <span>-</span>
        </li>
        <li class="flex flex-wrap items-center justify-between gap-2 py-1 border-b last:border-b-0">
            <span>Tanggal Selesai</span>
            <span>-</span>
        </li>
        <li>
            <span>Deskripsi</span>
            <span>-</span>
        </li>
    </ol>
    </x-slot:content>
</x-mary-collapse>
