<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - FauCoffee Admin</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-icon.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/faucoffee.css') }}" rel="stylesheet">
</head>
<body>
<div class="admin-wrap">
    <aside class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand d-flex align-items-center gap-2 mb-4 px-2 bg-transparent"><img src="{{ asset('images/logo-icon.svg') }}" width="40" height="40" alt="Logo"><span class="brand-text fs-5">Fau<em>Coffee</em></span></a>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Kategori</a>
        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Produk</a>
        <a href="{{ route('home') }}" target="_blank">Lihat Website</a>
        <form action="{{ route('admin.logout') }}" method="POST">@csrf<button type="submit">Keluar</button></form>
    </aside>
    <div class="admin-main">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
