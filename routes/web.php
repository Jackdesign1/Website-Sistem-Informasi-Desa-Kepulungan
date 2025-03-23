<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/tentang-kami', function () {
    return view('pages.about');
});

Route::get('/destinasi-wisata', function () {
    return view('pages.destinasi');
});

Route::get('/berita', function () {
    return view('pages.berita');
});

Route::get('/galeri', function () {
    return view('pages.galeri');
});

Route::get('/kontak', function () {
    return view('pages.kontak');
});
