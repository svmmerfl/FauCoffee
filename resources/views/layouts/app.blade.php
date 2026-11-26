<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'FauCoffee') - FauCoffee</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-icon.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/faucoffee.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-fau sticky-top">
    <div class="container">
        <a class="navbar-brand brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-icon.svg') }}" height="42" width="42" alt="Logo FauCoffee">
            <span class="brand-text">Fau<em>Coffee</em></span>
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#tentang">Tentang</a></li>
                <li class="nav-item ms-lg-3"><a class="btn btn-caramel btn-sm" href="{{ route('admin.dashboard') }}">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
@if(session('success'))<div class="container mt-3"><div class="alert alert-success alert-dismissible fade show mb-0">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div></div>@endif
@yield('content')
</main>

<footer class="footer-fau">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-5">
                <img src="{{ asset('images/logo-full-light.svg') }}" alt="FauCoffee" height="64" class="mb-3">
                <p class="small">Kedai kopi dengan suasana hangat, biji kopi pilihan, dan racikan sepenuh hati.</p>
            </div>
            <div class="col-md-3">
                <h6 class="text-white">Jam Buka</h6>
                <p class="small mb-0">{{ config('faucoffee.hours') }}</p>
            </div>
            <div class="col-md-4">
                <h6 class="text-white">Kontak</h6>
                <p class="small mb-0">{{ config('faucoffee.address') }}<br>Instagram: <a href="#">{{ config('faucoffee.instagram') }}</a></p>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-center small mb-0">&copy; {{ date('Y') }} FauCoffee. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
