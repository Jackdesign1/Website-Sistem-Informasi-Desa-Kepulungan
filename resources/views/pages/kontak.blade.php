@extends('layouts.app')

@section('title', 'Beranda - Wisata Air Panas Wong Pulungan ')

@section('content')



<section class="position-relative text-center text-white">
    <img src="{{ asset('images/BG_3.png') }}" class="img-fluid w-100" style="filter: brightness(0.7);">

    <div class="position-absolute top-50 start-50 translate-middle">
        <h1 class="fw-bold">Hubungi Kami Jika Terdapat Permasalahan atau Kolaborasi</h1>
    </div>
</section>

<!-- Contact Section -->
<section class="container my-5">
    <div class="row g-4">
        <!-- Contact Info -->
        <div class="col-lg-5">
            <div class="bg-primary text-white p-4 rounded shadow-sm">
                <h4 class="fw-bold">Wisata Air Panas Wong Pulungan</h4>
                <p>Desa Kepulungan, Kecamatan Gempol, Kabupaten Pasuruan, Jawa Timur</p>
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-envelope fs-4 me-2"></i>
                    <p class="mb-0">wisatawongpulungan@gmail.com</p>
                </div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-telephone fs-4 me-2"></i>
                    <p class="mb-0">+62 812-3456-7890</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-7">
            <div class="p-4 bg-white rounded shadow-sm">
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nama Anda">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="No Telepon">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Alamat Email">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Isi Pesan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


@endsection
