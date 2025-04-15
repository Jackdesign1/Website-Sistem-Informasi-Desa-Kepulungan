<div class="relative">
   <div class="absolute top-0 bottom-0 left-0 right-0 z-10 bg-gradient bg-gradient-to-tr from-black/40 to-black/10"></div>
   <div class="w-full aspect-[16/6] carousel">
      @for ($i = 1; $i <= 4; $i++)
      <div id="slide{{ $i }}" class="relative w-full carousel-item">
         <img
         src="/assets/images/hero-image.png"
         class="object-cover w-full" />
         <div class="absolute z-20 flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide{{ $i - 1 }}" class="btn btn-circle">❮</a>
            <a href="#slide{{ $i + 1 }}" class="btn btn-circle">❯</a>
         </div>
         <div class="absolute z-20 text-white md:text-4xl xl:text-5xl md:left-24 lg:left-32 bottom-24 max-w-96">
            Bupati Pasuruan Resmikan Wisata Air Panas Kepulungan
         </div>
      </div>
      @endfor
   </div>
</div>