@extends('layouts.app')

@section('title', 'Beranda - Wisata Air Panas Wong Pulungan ')

@section('content')
  <div class="container pt-5">
    <div class="text-center text-white py-4 rounded shadow"
         style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
        <h2 class="fw-bold">Destinasi Wisata Air Panas Wong Pulungan</h2>
    </div>
</div>

<body>

<div class="container py-3">
  <div class="row align-items-center">
    <!-- Kiri: Judul -->
    <div class="col-md-6">
      <h2 class="fw-bold mb-0">Destinasi Wisata</h2>
    </div>
    <!-- Kanan: Tombol Kategori -->
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
      <button class="btn btn-primary me-2 filter-btn" data-filter="all">All Content</button>
      <button class="btn btn-outline-primary me-2 filter-btn" data-filter="air-panas">Air Panas</button>
      <button class="btn btn-outline-primary me-2 filter-btn" data-filter="taman-kelinci">Taman Kelinci</button>
      <button class="btn btn-outline-primary filter-btn" data-filter="terapi-ikan">Terapi Ikan</button>
    </div>
  </div>
</div>

<!-- Row 2: Hero Text -->
<div class="container-fluid bg-light py-5 text-center">
  <h1 class="display-5 fw-bold">Hangatkan Raga, Lestarikan Alam</h1>
  <p class="lead text-muted">Nikmati Kehangatan Alami yang Menyejukkan Badan dan Menenangkan Pikiran</p>
</div>

<!-- Row 3: Grid Gambar -->
<div class="container py-5">
  <div class="row g-4" id="gallery">
    <!-- Contoh Card 1 -->
    <div class="col-md-4 wisata-item" data-category="air-panas">
      <div class="card">
        <img src="{{ asset('images/Pendopo.png') }}" class="card-img-top" alt="Air Panas">
        <div class="card-body">
          <h5 class="card-title">Air Panas</h5>
          <p class="card-text">Pendopo dengan nuansa kerajaan majapahit</p>
        </div>
      </div>
    </div>
    <!-- Contoh Card 2 -->
    <div class="col-md-4 wisata-item" data-category="taman-kelinci">
      <div class="card">
        <img src="{{ asset('images/BG_1.png') }}" class="card-img-top" alt="Taman Kelinci">
        <div class="card-body">
          <h5 class="card-title">Taman Kelinci</h5>
          <p class="card-text">Bermain bersama kelinci lucu di taman hijau yang asri.</p>
        </div>
      </div>
    </div>
    <!-- Contoh Card 3 -->
    <div class="col-md-4 wisata-item" data-category="terapi-ikan">
      <div class="card">
        <img src="{{ asset('images/BG_3.png') }}" class="card-img-top" alt="Terapi Ikan">
        <div class="card-body">
          <h5 class="card-title">Terapi Ikan</h5>
          <p class="card-text">Rasakan sensasi unik terapi ikan untuk relaksasi dan kesehatan kulit.</p>
        </div>
      </div>
    </div>
    <!-- Contoh Card 4 (All Content) -->
    <div class="col-md-4 wisata-item" data-category="air-panas">
      <div class="card">
        <img src="{{ asset('images/Terapi_Ikan.png') }}" class="card-img-top" alt="Air Panas 2">
        <div class="card-body">
          <h5 class="card-title">Air Panas 2</h5>
          <p class="card-text">Pemandian air panas alami di tengah keindahan pegunungan.</p>
        </div>
      </div>
    </div>
    <!-- Tambahkan lagi card sesuai kebutuhan... -->

<div class="col-md-4 wisata-item" data-category="air-panas">
      <div class="card">
        <img src="{{ asset('images/Terapi_Ikan.png') }}" class="card-img-top" alt="Air Panas 2">
        <div class="card-body">
          <h5 class="card-title">Air Panas 2</h5>
          <p class="card-text">Pemandian air panas alami di tengah keindahan pegunungan.</p>
        </div>
      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const wisataItems = document.querySelectorAll('.wisata-item');

    filterBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        // Ganti style tombol
        filterBtns.forEach(b => b.classList.replace('btn-primary', 'btn-outline-primary'));
        this.classList.replace('btn-outline-primary', 'btn-primary');

        const filter = this.getAttribute('data-filter');
        wisataItems.forEach(item => {
          if (filter === 'all' || item.getAttribute('data-category') === filter) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  });
</script>

@endsection
