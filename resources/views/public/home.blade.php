@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

{{-- HERO --}}
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <p class="text-caramel text-uppercase fw-semibold mb-2" style="letter-spacing:.25em">Selamat datang di</p>
                <h1>Secangkir kehangatan di setiap <span>tegukan</span></h1>
                <p class="lead mt-3 mb-4 text-white-50">FauCoffee menyajikan kopi pilihan dengan suasana nyaman untuk bekerja, berbincang, atau sekadar menikmati waktu.</p>
                <div class="hero-tags mb-3"><span>☕ Biji Pilihan</span><span>🌿 Racikan Segar</span><span>🕗 Buka Setiap Hari</span></div>
                <a href="{{ route('products.index') }}" class="btn btn-caramel me-2">Lihat Menu</a>
                <a href="#tentang" class="btn btn-outline-light rounded-pill px-4">Tentang Kami</a>
            </div>
            <div class="col-lg-5 text-center">
                <img src="{{ asset('images/logo-icon.svg') }}" alt="Logo FauCoffee" class="hero-logo">
            </div>
        </div>
    </div>
    <div class="hero-wave"><svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0 30C240 70 480 0 720 25s480 45 720 5V60H0z" fill="#f7efe3"/></svg></div>
</section>

{{-- KEUNGGULAN --}}
<section class="section pb-0">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4"><div class="feature"><div class="ico">🫘</div><h5>Biji Kopi Pilihan</h5><p class="small text-muted mb-0">Dipilih dari petani lokal nusantara dan disangrai segar setiap minggu.</p></div></div>
            <div class="col-md-4"><div class="feature"><div class="ico">👨‍🍳</div><h5>Racikan Barista</h5><p class="small text-muted mb-0">Setiap cangkir dibuat dengan takaran dan teknik yang konsisten.</p></div></div>
            <div class="col-md-4"><div class="feature"><div class="ico">🛋️</div><h5>Suasana Nyaman</h5><p class="small text-muted mb-0">Tempat hangat dan tenang, cocok untuk belajar, bekerja, dan berkumpul.</p></div></div>
        </div>
    </div>
</section>

{{-- TENTANG --}}
<section class="section" id="tentang">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <small class="text-caramel fw-semibold text-uppercase" style="letter-spacing:.2em">Tentang Kami</small>
                <h2 class="mt-2">Dibuat dengan cinta, disajikan dengan rasa</h2>
                <p class="mt-3">FauCoffee adalah UMKM kedai kopi yang berkomitmen menyajikan kopi berkualitas dengan harga bersahabat. Kami percaya secangkir kopi yang baik dimulai dari biji yang tepat, proses yang teliti, dan pelayanan yang tulus.</p>
                <p>Dari espresso klasik hingga minuman kekinian, semua menu kami diracik langsung oleh barista agar cita rasanya selalu terjaga.</p>
            </div>
            <div class="col-lg-6">
                <div class="about-box">
                    <h4 class="text-caramel">Visi Kami</h4>
                    <p class="mb-4">Menjadi kedai kopi lokal yang hangat, terpercaya, dan dicintai masyarakat.</p>
                    <h4 class="text-caramel">Misi Kami</h4>
                    <ul class="mb-0 ps-3">
                        <li>Menyajikan kopi dan minuman berkualitas.</li>
                        <li>Mendukung petani kopi lokal.</li>
                        <li>Menghadirkan pelayanan yang ramah.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- KATEGORI --}}
<section class="section section-alt">
    <div class="container">
        <div class="section-title"><small>Kategori</small><h2>Pilih Kesukaanmu</h2></div>
        <div class="row g-4 justify-content-center">
            @forelse($categories as $category)
            <div class="col-12 col-sm-6 col-md-4">
                <a href="{{ route('products.index', ['kategori' => $category->id]) }}" class="text-decoration-none text-dark">
                    <div class="cat-card">
                        <div class="icon fs-3">☕</div>
                        <h5 class="mt-3">{{ $category->name }}</h5>
                        <p class="small text-muted mb-2">{{ $category->description }}</p>
                        <span class="badge badge-cat px-3 py-2">{{ $category->products_count }} produk</span>
                    </div>
                </a>
            </div>
            @empty
                <p class="text-center text-muted">Belum ada kategori.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- PRODUK --}}
<section class="section">
    <div class="container">
        <div class="section-title"><small>Menu</small><h2>Produk Terbaru</h2></div>
        <div class="row g-4">
            @forelse($products as $product)
                @include('public._card', ['product' => $product])
            @empty
                <p class="text-center text-muted">Belum ada produk.</p>
            @endforelse
        </div>
        <div class="text-center mt-5"><a href="{{ route('products.index') }}" class="btn btn-outline-dark-fau px-4">Lihat Semua Menu</a></div>
    </div>
</section>

{{-- CTA --}}
<section class="pb-5">
    <div class="container">
        <div class="cta-band">
            <h2 class="mb-2">Siap menikmati kopi favoritmu?</h2>
            <p class="mb-4">Kunjungi FauCoffee hari ini dan rasakan kehangatannya.</p>
            <a href="{{ route('products.index') }}" class="btn">Jelajahi Menu</a>
        </div>
    </div>
</section>

{{-- INFO --}}
<section class="section section-alt">
    <div class="container">
        <div class="section-title"><small>Kunjungi Kami</small><h2>Informasi Kedai</h2></div>
        <div class="row g-4">
            <div class="col-md-4"><div class="info-card text-center"><div class="ico">📍</div><h5 class="mt-2">Lokasi</h5><p class="small text-muted mb-0">{{ config('faucoffee.address') }}</p></div></div>
            <div class="col-md-4"><div class="info-card text-center"><div class="ico">🕗</div><h5 class="mt-2">Jam Buka</h5><p class="small text-muted mb-0">{{ config('faucoffee.hours') }}</p></div></div>
            <div class="col-md-4"><div class="info-card text-center"><div class="ico">📱</div><h5 class="mt-2">Media Sosial</h5><p class="small text-muted mb-0">Instagram {{ config('faucoffee.instagram') }}</p></div></div>
        </div>
    </div>
</section>
@endsection
