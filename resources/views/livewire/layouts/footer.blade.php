{{-- <div class="pt-5 space-y-7">
<div class="px-6 mx-auto">
   <div class="flex flex-col items-center justify-between md:flex-row">
      <!-- Logo and Title -->
      <div class="flex items-center gap-3 mb-4 md:mb-0">
         <div class="">
               <img src="{{ asset('assets/images/logo-desa-kapulungan.png') }}">
         </div>
         <div class="text-center md:text-left">
               <h1 class="text-lg font-bold text-gray-800">Pemerintah Desa Kepulungan</h1>
               <p class="text-gray-600">Kabupaten Pasuruan</p>
         </div>
      </div>
      <!-- Contact Info -->
      <div class="text-center md:text-right">
         <p class="text-gray-600">Kantor Desa Kepulungan</p>
         <p class="text-gray-600">Kepulungan - Gempol jl. surabaya malang, </p>
         <p class="text-gray-600">Kabupaten Pasuruan, Jawa Timur 67155, Indonesia.</p>
         <div class="flex justify-end mt-1 space-x-2">
               <a href="#" class="text-[#003087]"><i class="fab fa-facebook-f"></i></a>
               <a href="#" class="text-[#003087]"><i class="fab fa-youtube"></i></a>
               <a href="#" class="text-[#003087]"><i class="fab fa-instagram"></i></a>
               <a href="#" class="text-[#003087]"><i class="fab fa-linkedin-in"></i></a>
         </div>
      </div>
   </div>

   <!-- Navigation Menu -->
   <div class="grid grid-cols-1 gap-6 px-4 mt-6 md:grid-cols-4">
      <!-- Tentang -->
      <div>
         <h3 class="mb-1 font-semibold text-gray-800">Lorem</h3>
         <ul class="space-y-0.5">
               <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>

         </ul>
      </div>
      <!-- Fasilitas -->
      <div>
         <h3 class="mb-1 font-semibold text-gray-800">Lorem</h3>
         <ul class="space-y-0.5">
               <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>
               </ul>
      </div>
      <!-- Layanan -->
      <div>
         <h3 class="mb-1 font-semibold text-gray-800">Lorem</h3>
         <ul class="space-y-0.5">
               <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>

         </ul>
      </div>
      <!-- Informasi Umum -->
      <div>
         <h3 class="mb-1 font-semibold text-gray-800">Lorem</h3>
         <ul class="space-y-0.5">
               <li><a href="#" class="text-gray-600 hover:text-[#003087]">Lorem</a></li>

         </ul>
      </div>
   </div>
</div>

<footer class="py-3 border-t border-gray-200">
   <div class="container px-6 mx-auto text-center">
      <p class="text-gray-600">Program Studi Teknik Informatika PSDKU Sidoarjo</p>
      <p class="text-gray-600">Politeknik Negeri Jember © Copyright 2025</p>
   </div>
</footer>
</div> --}}


<footer class="px-8 py-12 text-gray-800"> 
   <div class="flex flex-wrap justify-between w-full gap-8 mx-auto max-w-7xl"> 
   <!-- Kolom 1: Logo dan Alamat --> 
   <div class="pe-5"> 
      <div class="flex items-start mb-4 space-x-4"> 
         <img src="{{ asset('assets/images/logo-desa-kapulungan.png') }}" alt="Logo" class="object-contain w-24 h-auto"> 
         <div> 
            <h2 class="text-lg font-bold leading-snug whitespace-nowrap">Pemerintah Desa <br> Kepulungan</h2> 
            <p class="text-sm">Kabupaten Pasuruan</p> 
         </div> 
      </div> 
      <p class="mt-2 text-sm"> 
         Kantor Desa Kepulungan<br> 
         Jl. Dau Darmorejo No. 45 Desa Kepulungan<br> 
         Kec. Gempol Kab. Pasuruan 67155 
      </p> 
      <div class="flex mt-4 space-x-3"> 
         <x-mary-icon name="tabler.brand-instagram" tag="a" href="https://instagram.com" target="_blank" class="w-8 h-8 text-pink-500 hover:text-pink-600" />
         <x-mary-icon name="tabler.brand-tiktok" tag="a" href="https://tiktok.com" target="_blank" class="w-8 h-8 text-black hover:text-gray-700" />
         <x-mary-icon name="tabler.brand-whatsapp" tag="a" href="https://wa.me/" target="_blank" class="w-8 h-8 text-green-500 hover:text-green-600" />
      </div> 
   </div> 

   
   <div> 
      <h3 class="mb-2 font-semibold">Tentang</h3> 
      <ul class="space-y-1 text-sm"> 
         <li><a href="{{ route('village-profile') }}" class="hover:underline">Sejarah Desa</a></li> 
         <li><a href="{{ route('village-profile') }}" class="hover:underline">Aparatur Desa</a></li> 
         <li><a href="{{ route('village-profile') }}" class="hover:underline">Struktur Desa</a></li> 
         <li><a href="{{ route('village-profile') }}" class="hover:underline">Anggaran Desa</a></li> 
         <li><a href="{{ route('village-profile') }}" class="hover:underline">Visi & Misi</a></li> 
         <li><a href="{{ route('village-profile') }}" class="hover:underline">Lokasi Desa</a></li> 
      </ul> 
   </div> 

   
   <div> 
      <h3 class="mb-2 font-semibold">Informasi</h3> 
      <ul class="space-y-1 text-sm"> 
         <li><a href="{{ route('information.index') }}" class="hover:underline">Berita</a></li> 
         <li><a href="{{ route('information.index') }}" class="hover:underline">Laporan</a></li> 
         <li><a href="{{ route('information.index') }}" class="hover:underline">Lowongan Kerja</a></li> 
      </ul> 
   </div> 

   
   <div> 
      <h3 class="mb-2 font-semibold">BUMDesa</h3> 
      <ul class="space-y-1 text-sm"> 
         <li><a href="{{ route('bumdes') }}" class="hover:underline">Wisata Air Panas</a></li> 
         <li><a href="{{ route('bumdes') }}" class="hover:underline">Koperasi Merah Putih</a></li> 
         <li><a href="{{ route('bumdes') }}" class="hover:underline">Bank Sampah</a></li> 
      </ul> 
   </div> 

      
   <div> 
      <h3 class="mb-2 font-semibold">Kontak</h3> 
      <ul class="space-y-1 text-sm"> 
         <li><a href="{{ route('contact') }}" class="hover:underline">Laporan Warga</a></li> 
         <li><a href="{{ route('contact') }}" class="hover:underline">Cek Laporan Warga</a></li> 
         <li><a href="{{ route('contact') }}" class="hover:underline">Kerja Sama</a></li> 
      </ul> 
   </div> 
   </div> 
   <div class="pt-4 mt-10 text-sm text-center text-gray-600 border-t"> 
      © 2025 Pemerintah Desa Kepulungan. Developed by Bara Api Digital 
   </div> 
</footer> 