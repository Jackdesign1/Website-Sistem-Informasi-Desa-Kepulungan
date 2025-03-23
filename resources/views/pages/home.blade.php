@extends('layouts.app')

@section('title', 'Beranda - Wisata Air Panas Wong Pulungan')

@section('content')

<!-- Carousel Bootstrap 5 -->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#Wisata_1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#wisata_2" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#wisata_3" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/BG_1.png') }}" class="d-block w-100" alt="Los Angeles">
    </div>

    <div class="carousel-item">
      <img src="{{ asset('images/Pendopo.png') }}" class="d-block w-100" alt="Chicago">
    </div>

    <div class="carousel-item">
      <img src="{{ asset('images/BG_3.png') }}" class="d-block w-100" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

</div>

<div class="container text-center my-5">
    <h1 class="fw-bold">Kenal Lebih Dekat Dengan</h1>
    <h1 class="fw-normal">Wisata Air Panas Wong Pulungan</h1>
    <a href="https://www.youtube.com/watch?v=z6nSQrYWJlY" target="_blank">
        <img src="https://img.youtube.com/vi/z6nSQrYWJlY/maxresdefault.jpg" alt="Thumbnail Video" class="img-fluid rounded mt-4">
    </a>
</div>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <h1 class="fw-bold text-center my-5">Wisata yang Tersedia</h1>
  <div class="position-absolute top-0 end-0 me-3 mt-3 z-3">
            <button class="btn btn-light border rounded-circle me-2" data-bs-target="#carouselExample" data-bs-slide="prev">
                &#10094; <!-- Simbol panah kiri -->
            </button>
            <button class="btn btn-light border rounded-circle" data-bs-target="#carouselExample" data-bs-slide="next">
                &#10095; <!-- Simbol panah kanan -->
            </button>
        </div>
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ asset('images/Contoh_Slider.png') }}" class="d-block w-100 rounded" alt="Wisata Air Panas">
                        <div class="card-body text-center bg-light">
                            <h5 class="fw-bold">Wisata Air Panas</h5>
                            <p class="text-muted">Nikmati kehangatan alami dan relaksasi di area air panas dengan fasilitas lengkap dan pemandangan alam yang menenangkan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ asset('images/Contoh_Slider.png') }}" class="d-block w-100 rounded" alt="Wisata Air Panas">
                        <div class="card-body text-center bg-light">
                            <h5 class="fw-bold">Wisata Air Panas</h5>
                            <p class="text-muted">Rasakan sensasi berendam di air panas alami sambil menikmati keindahan pegunungan dan udara yang segar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ asset('images/Contoh_Slider.png') }}" class="d-block w-100 rounded" alt="Wisata Air Panas">
                        <div class="card-body text-center bg-light">
                            <h5 class="fw-bold">Wisata Air Panas</h5>
                            <p class="text-muted">Fasilitas terbaik untuk keluarga dengan berbagai pilihan kolam, sauna, dan area relaksasi eksklusif.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 (Bisa Ditambah Lagi) -->
        <div class="carousel-item">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ asset('images/Contoh_Slider.png') }}" class="d-block w-100 rounded" alt="Wisata Air Panas">
                        <div class="card-body text-center bg-light">
                            <h5 class="fw-bold">Wisata Air Panas</h5>
                            <p class="text-muted">Tempat relaksasi terbaik dengan kolam air panas alami dan suasana pegunungan yang menenangkan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ asset('images/Contoh_Slider.png') }}" class="d-block w-100 rounded" alt="Wisata Air Panas">
                        <div class="card-body text-center bg-light">
                            <h5 class="fw-bold">Wisata Air Panas</h5>
                            <p class="text-muted">Berendam di air panas yang menyegarkan sambil menikmati keindahan alam yang luar biasa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0">
                        <img src="{{ asset('images/Contoh_Slider.png') }}" class="d-block w-100 rounded" alt="Wisata Air Panas">
                        <div class="card-body text-center bg-light">
                            <h5 class="fw-bold">Wisata Air Panas</h5>
                            <p class="text-muted">Liburan sempurna dengan suasana alami, air panas, dan fasilitas lengkap.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container mt-5">
    <div class="card text-center text-white bg-danger border-0 shadow-lg">
        <div class="card-body p-">
            <h1 class="fw-bold"><i class="bi bi-gift-fill"></i> Promo Liburan Akhir Tahun! 🎊</h1>
            <p class="fs-5">
                Nikmati diskon <span class="fw-bold">hingga 50%</span> untuk tiket masuk dan paket wisata spesial!  
                Dapatkan juga penawaran eksklusif untuk produk UMKM lokal selama periode liburan ini.  
                Jangan sampai ketinggalan! ⏳
            </p>
            <a href="#" class="btn btn-warning btn-lg fw-bold"><i class="bi bi-arrow-right-circle"></i> Lihat Detail Promo</a>
        </div>
    </div>
</div>


<div class="container-fluid bg-light py-5 my-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Bagian Kiri (Teks) -->
            <div class="col-lg-6">
                <p class="text-primary fw-bold">Download Aplikasi Air Panas Wong Pulungan</p>
                <h1 class="fw-bold">Aplikasi Sistem Informasi Wisata Wong Pulungan</h1>
                 <ul class="list-unstyled mt-3">
                    <li class="mb-2"><i class="bi bi-geo-alt-fill text-danger"></i> Lokasi wisata lengkap</li>
                    <li class="mb-2"><i class="bi bi-calendar-event-fill text-warning"></i> Jadwal buka & event terbaru</li>
                    <li class="mb-2"><i class="bi bi-ticket-perforated-fill text-primary"></i> Pemesanan tiket online</li>
                    <li class="mb-2"><i class="bi bi-chat-dots-fill text-success"></i> Review & testimoni pengunjung</li>
                </ul>
                <a href="https://play.google.com/store" class="btn btn-primary btn-lg mt-3">
                    <i class="bi bi-google-play"></i> Download Sekarang
                </a>
            </div>
            
            <!-- Bagian Kanan (Gambar) -->
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/Android.png') }}" alt="Tampilan Aplikasi" class="img-fluid shadow-lg rounded" style="width: 200px; height: auto;">
                
            </div>
        </div>
    </div>
</div>


<div class="container-fluid bg-light py-5">
    <div class="container text-center">
        <!-- Judul -->
        <h2 class="fw-bold">Apa Kata Mereka?</h2>
        <p class="text-muted">Apa yang mereka rasakan setelah mencoba Wisata Air Panas Wong Pulungan.</p>

        <!-- Testimoni -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle mb-3" width="60" height="60" alt="Rahmat Hidayat">
                        <p class="fst-italic">"Wisata ini luar biasa! Airnya sangat hangat dan menyegarkan. Sangat cocok untuk relaksasi setelah minggu yang melelahkan."</p>
                        <h6 class="fw-bold">Rahmat Hidayat</h6>
                        <p class="text-muted">Traveler & Blogger</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://randomuser.me/api/portraits/women/45.jpg" class="rounded-circle mb-3" width="60" height="60" alt="Siti Aminah">
                        <p class="fst-italic">"Pelayanan sangat ramah, tempatnya bersih, dan pemandangannya indah. Saya pasti akan kembali lagi!"</p>
                        <h6 class="fw-bold">Siti Aminah</h6>
                        <p class="text-muted">Pecinta Alam</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://randomuser.me/api/portraits/men/50.jpg" class="rounded-circle mb-3" width="60" height="60" alt="Budi Santoso">
                        <p class="fst-italic">"Sensasi berendam di air panas alami ini tidak ada duanya. Sangat membantu mengurangi stres dan pegal-pegal!"</p>
                        <h6 class="fw-bold">Budi Santoso</h6>
                        <p class="text-muted">Karyawan Swasta</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 text-center">
    <h2 class="fw-bold">Lokasi Wisata</h2>
    <div class="ratio ratio-16x9 mt-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31724.57276809747!2d112.6063549!3d-7.5557396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e781d3db5d9c8c9%3A0x4e6e78efb6e18b22!2sWong%20Pulungan%20Hot%20Spring!5e0!3m2!1sen!2sid!4v1711081274934" 
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


</div>




@endsection
