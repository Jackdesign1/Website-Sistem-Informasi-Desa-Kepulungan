<div class="flex flex-col items-center gap-16 text-justify lg:flex-row md:text-left">
   <x-header class="mb-7 md:hidden">Sambutan Kepala Desa</x-header>
   <div class="flex-shrink">
      <img src="{{ asset('assets/images/Pak_Didik.png') }}" alt="" class="object-cover w-full h-full shadow-lg rounded-xl aspect-square max-w-96">
   </div>
   <div class="flex-1">
      @if (request()->routeIs('village-profile'))
         <x-header class="hidden md:inline-block">Sambutan Kepala Desa</x-header> 
      @endif
      <h4 class="text-2xl font-semibold">Didik Hartono S.H.,M.H</h4>
      <p class="mt-4"><span class="font-semibold">Assalamualaikum Wr. Wb.</span>
            <br> selamat datang di website resmi Pemerintah Desa Kepulungan. Dengan rasa syukur kepada Allah SWT, kami hadirkan platform ini sebagai wujud komitmen untuk transparansi dan kemudahan akses informasi. Di tengah pesatnya teknologi, website ini menjadi sarana menyampaikan perkembangan, kegiatan, dan capaian pembangunan desa secara faktual dan real-time, mengundang seluruh masyarakat desa kepulungan untuk memanfaatkannya demi kemajuan bersama. Penghargaan setinggi-tingginya serta terima kasih kami sampaikan kepada Tim Dosen dan Mahasiswa Program Studi Teknik Informatika PSDKU Sidoarjo Politeknik Negeri Jember yang telah membantu mewujudkan Website Pemerintah desa Kepulungan.
      </p>
   </div>
</div>