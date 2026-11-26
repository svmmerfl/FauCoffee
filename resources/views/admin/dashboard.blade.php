@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<h2 class="mb-1">Dashboard</h2>
<p class="text-muted mb-4">Ringkasan data FauCoffee.</p>
<div class="row g-4 mb-4">
    <div class="col-md-4"><div class="stat"><p class="mb-1 text-muted">Total Kategori</p><h2>{{ $totalCategories }}</h2></div></div>
    <div class="col-md-4"><div class="stat"><p class="mb-1 text-muted">Total Produk</p><h2>{{ $totalProducts }}</h2></div></div>
    <div class="col-md-4"><div class="stat"><p class="mb-1 text-muted">Rata-rata Harga</p><h2>Rp {{ number_format($averagePrice, 0, ',', '.') }}</h2></div></div>
</div>
<div class="row g-4">
    <div class="col-lg-7">
        <div class="stat h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Produk Terbaru</h5>
                <a href="{{ route('admin.products.create') }}" class="btn btn-caramel btn-sm">+ Produk</a>
            </div>
            <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Foto</th><th>Nama</th><th>Kategori</th><th>Harga</th></tr></thead>
                <tbody>
                @forelse($latestProducts as $p)
                    <tr><td><img src="{{ $p->image_url }}" class="thumb" alt=""></td><td>{{ $p->name }}</td><td>{{ $p->category->name }}</td><td>{{ $p->formatted_price }}</td></tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada produk.</td></tr>
                @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="stat h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Produk per Kategori</h5>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-dark-fau btn-sm">+ Kategori</a>
            </div>
            @forelse($categories as $c)
                @php $pct = $totalProducts ? round($c->products_count / $totalProducts * 100) : 0; @endphp
                <div class="mb-3">
                    <div class="d-flex justify-content-between small"><span>{{ $c->name }}</span><span>{{ $c->products_count }} produk</span></div>
                    <div class="progress" style="height:8px"><div class="progress-bar" style="width:{{ $pct }}%;background:var(--caramel)"></div></div>
                </div>
            @empty
                <p class="text-muted mb-0">Belum ada kategori.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
