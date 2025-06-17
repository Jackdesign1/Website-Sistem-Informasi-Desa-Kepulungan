<div class="flex flex-col items-center gap-16 text-justify md:flex-row md:text-left">
   <div class="flex-1 space-y-4">
      <x-header>Profil Desa Kapulungan</x-header>

      <img src="{{ asset('assets/images/Foto_Desa.jpg') }}" alt="" class="object-cover w-full h-full shadow-lg rounded-xl aspect-video md:hidden">

      <p>Desa Kepulungan berlokasi di Kecamatan Gempol, Kabupaten Pasuruan, Provinsi Jawa Timur, dulunya dikenal sebagai pintu gerbang menuju Gunung Pawitra, sebuah wilayah yang pernah menjadi bagian dari Kerajaan Negeri Aryapada pada masa Hindu-Buddha sekitar abad ke-10 hingga 13. Banyak prasasti yang ditemukan di Desa Kepulungan menjadi bukti bahwa desa ini memiliki peran penting sebagai pusat kegiatan keagamaan dan administratif pada masa itu, dengan peninggalan berupa situs-situs kuno dan benda-benda arkeologi yang menggambarkan kehidupan masyarakat yang kental dengan budaya Hindu. Seiring berjalannya waktu, Desa Kepulungan berkembang menjadi pemukiman agraris yang memanfaatkan kesuburan tanah di sekitar Gunung Pawitra, sambil tetap melestarikan jejak sejarahnya sebagai bagian dari warisan budaya Pasuruan.</p>
      @if (!request()->routeIs('village-profile'))
         <x-mary-button class="btn btn-success" link="profil-desa"  label="Lebih Detail"/>
      @endif
   </div>
   <div class="flex-[.8] hidden md:block">
      <img src="{{ asset('assets/images/Foto_Desa.jpg') }}" alt="" class="object-cover w-full h-full shadow-lg rounded-xl aspect-video">
   </div>
</div>