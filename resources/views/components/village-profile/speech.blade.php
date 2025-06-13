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
            <br> Dengan rasa syukur kepada Allah SWT, kami menghadirkan media digital ini sebagai sarana komunikasi dan transparansi antara pemerintah desa dan seluruh warga masyarakat. Website ini dibangun untuk menjawab kebutuhan zaman yang terus berkembang, di mana informasi harus dapat diakses dengan mudah, cepat, dan akurat. Melalui platform ini, kami ingin memastikan bahwa setiap warga dapat mengetahui berbagai kegiatan, program pembangunan, layanan administrasi, serta perkembangan yang berlangsung di Desa Kepulungan secara real-time. Kami juga berharap website ini bisa menjadi jembatan partisipasi masyarakat dalam pembangunan desa. Kritik, saran, dan masukan dari seluruh elemen masyarakat sangat kami harapkan demi terciptanya tata kelola pemerintahan desa yang lebih baik, inklusif, dan partisipatif. Semoga kehadiran website ini membawa manfaat dan kemudahan bagi seluruh warga, serta menjadi salah satu langkah nyata menuju desa yang lebih maju, transparan, dan sejahtera. 
      </p>
   </div>
</div>