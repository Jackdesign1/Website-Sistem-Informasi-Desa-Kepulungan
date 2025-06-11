@props(['job'])
<div {{ $attributes->merge(['class' => 'relative flex flex-1 gap-3 p-4 bg-white border rounded-lg shadow-lg']) }} x-data="{showMore: false}">
   <div>
         <img class="size-10 rounded-box" src="{{ asset($job->company_logo) }}"/>
   </div>
   <div class="flex-1">
      <div class="mb-3">
         <div>{{ $job->company_name }}</div>
         <div class="text-sm font-semibold capitalize opacity-60">Posisi: <span class="font-semibold">{{ $job->position }}</span></div>
         <div class="text-sm font-semibold capitalize opacity-60">Batas Akhir Lowongan: <span class="font-semibold">{{ $job->expires_at? date('d M Y', strtotime($job->expires_at)) : '-' }}</span></div>
      </div>
      <div class="list-col-wrap pb-1.5">
         <div class="text-xl font-semibold capitalize">{{ $job->title }}</div>
         <div class="text-sm font-semibold opacity-60">Nomor Kontak: <span class="font-semibold">{{ $job->contact_email }}</span></div>
      </div>
   </div>
   <div class="flex items-end text-end ">
      {{-- <x-mary-button x-text="!showMore? 'Show More' : 'Show Less'" @click="showMore = !showMore" class="btn-sm btn-ghost" /> --}}
      <x-mary-button :label="$job->status == 'open'? 'Tersedia' : 'Tutup'" class="{{ $job->status == 'open'? 'btn-success' : '' }} capitalize"/>
   </div>
</div>