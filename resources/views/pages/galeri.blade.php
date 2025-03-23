@extends('layouts.app')

@section('title', 'Beranda - Wisata Air Panas Wong Pulungan ')

@section('content')
       <style>
        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .gallery .item {
            position: relative;
        }
        .gallery .item span {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>

   <div class="container py-5">
        <div class="container py-5">
    <div class="text-center text-white py-4 rounded shadow"
         style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
        <h2 class="fw-bold">Galery</h2>
    </div>
</div>
        <div class="row gallery g-3">
            <div class="col-md-6 item">
                <img src="https://picsum.photos/600/400" alt="">
                <span>Pemandangan Hari Minggu</span>
            </div>
            <div class="col-md-3 item">
                <img src="https://picsum.photos/400/400" alt="">
                <span>Danau</span>
            </div>
            <div class="col-md-3 item">
                <img src="https://picsum.photos/400/300" alt="">
                <span>Air Panas Penatahan</span>
            </div>
            <div class="col-md-4 item">
                <img src="https://picsum.photos/500/350" alt="">
                <span>Kolam Renang</span>
            </div>
            <div class="col-md-4 item">
                <img src="https://picsum.photos/500/400" alt="">
                <span>Jembatan</span>
            </div>
            <div class="col-md-4 item">
                <img src="https://picsum.photos/500/300" alt="">
                <span>Hari Jumat</span>
            </div>
            <div class="col-md-6 item">
                <img src="https://picsum.photos/600/350" alt="">
                <span>Pendopo Arcopodo</span>
            </div>
            <div class="col-md-6 item">
                <img src="https://picsum.photos/600/450" alt="">
                <span>Pengalaman</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
