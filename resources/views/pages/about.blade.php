@extends('layouts.app')

@section('title', 'Tentang Kami - Wisata Air Panas Wong Pulungan ')

@section('content')
     <!-- Tambahkan Margin untuk Jarak dari Navbar -->
   <div class="container pt-5">
    <div class="text-center text-white py-4 rounded shadow"
         style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
        <h2 class="fw-bold">Tentang Wisata Air Panas Wong Pulungan</h2>
    </div>
</div>

<div class="container-fluid bg-light py-5 my-5">
    <div class="container">
        <div class="row align-items-center">
           <!-- Bagian Kanan (Gambar) -->
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/BG_3.png') }}" class="d-block w-100" alt="New York">
                
            </div> 
            <!-- Bagian Kiri (Teks) -->
            <div class="col-lg-6">
                <h1 class="fw-bold">Sejarah Wisata Air Panas Wong Pulungan</h1>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            
            
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card p-4 border rounded-3 shadow">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                 <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Kepala Desa" class="img-fluid border rounded-2" style="max-width: 100%;">
            </div>
            <div class="col-md-8">
                <p class="mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                </p>
                <p class="mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                </p>

                <p class="mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                </p>
                <p class="fw-bold mb-0">Bapak H. Muhammad Zaky</p>
                <p class="text-muted">Kepala Desa Kepulungan</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card p-4 border rounded-3 shadow">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('images/Bupati.png') }}" alt="Bupati Pasuruan" class="img-fluid border rounded-2">
                <p class="text-white text-center small mt-2">Kominfo Kabupaten Pasuruan</p>
            </div>
            <div class="col-md-8">
                <h5 class="fw-bold">Apa Kata Bupati Pasuruan</h5>
                <p class="fst-italic">“Sering-sering mengadakan event untuk memancing dan menambah kunjungan wisata, kalau perlu masyarakat yang punya hajat bisa disini. Serta harus banyak kegiatan masyarakat untuk menumbuhkan pergerakan ekonomi yang pada akhirnya memberikan manfaat untuk UMKM sekitar.”</p>
                <p class="fw-bold mb-0">Gus Irsyad</p>
                <p class="text-muted">Bupati Pasuruan<br>(Periode 2013 - 2023)</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <!-- Header -->
    <div class="bg-light p-3 text-center fw-bold fs-4 border rounded">
        Visi & Misi Kami
    </div>

    <!-- Visi Section -->
    <div class="row align-items-center mt-4">
        <div class="col-md-4">
            <div class="bg-secondary rounded" style="height: 150px;"></div>
        </div>
        <div class="col-md-8">
            <h4 class="fw-bold">Visi</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
        </div>
    </div>

    <!-- Misi Section -->
    <div class="row align-items-center mt-4 flex-md-row-reverse">
        <div class="col-md-4">
            <div class="bg-secondary rounded" style="height: 150px;"></div>
        </div>
        <div class="col-md-8 text-md-end text-start">
            <h4 class="fw-bold">Misi</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
        </div>
    </div>
</div>

<div class="container my-5">
    <!-- Header -->

    <div class="bg-light p-3 text-center fw-bold fs-4 border rounded">
        Pengelola Wisata
    </div>
    

    <!-- Grid Pengelola Wisata -->
    <div class="row mt-4">
        <!-- Kartu Pengelola -->
        <div class="col-md-4 col-sm-6 text-center mb-4">
            <div class="bg-secondary rounded" style="height: 150px;"></div>
            <h5 class="fw-bold mt-2">Subandi</h5>
            <p class="text-muted">Pengelola Lorem</p>
        </div>
        <div class="col-md-4 col-sm-6 text-center mb-4">
            <div class="bg-secondary rounded" style="height: 150px;"></div>
            <h5 class="fw-bold mt-2">Subandi</h5>
            <p class="text-muted">Pengelola Lorem</p>
        </div>
        <div class="col-md-4 col-sm-6 text-center mb-4">
            <div class="bg-secondary rounded" style="height: 150px;"></div>
            <h5 class="fw-bold mt-2">Subandi</h5>
            <p class="text-muted">Pengelola Lorem</p>
        </div>
        <div class="col-md-4 col-sm-6 text-center mb-4">
            <div class="bg-secondary rounded" style="height: 150px;"></div>
            <h5 class="fw-bold mt-2">Subandi</h5>
            <p class="text-muted">Pengelola Lorem</p>
        </div>
        <div class="col-md-4 col-sm-6 text-center mb-4">
            <div class="bg-secondary rounded" style="height: 150px;"></div>
            <h5 class="fw-bold mt-2">Subandi</h5>
            <p class="text-muted">Pengelola Lorem</p>
        </div>
        <div class="col-md-4 col-sm-6 text-center mb-4">
            <div class="bg-secondary rounded" style="height: 150px;"></div>
            <h5 class="fw-bold mt-2">Subandi</h5>
            <p class="text-muted">Pengelola Lorem</p>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
