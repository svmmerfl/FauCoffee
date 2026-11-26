@extends('layouts.app')
@section('title', 'Halaman Tidak Ditemukan')
@section('content')
<section class="section text-center">
    <div class="container">
        <img src="{{ asset('images/logo-icon.svg') }}" width="120" alt="Logo FauCoffee" class="mb-4">
        <h1 class="display-4">404</h1>
        <h4>Halaman tidak ditemukan</h4>
        <p class="text-muted">Sepertinya halaman yang Anda cari sudah tidak ada atau alamatnya salah.</p>
        <a href="{{ route('home') }}" class="btn btn-caramel mt-2">Kembali ke Beranda</a>
    </div>
</section>
@endsection
