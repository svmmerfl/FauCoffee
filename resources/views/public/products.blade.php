@extends('layouts.app')
@section('title', 'Menu')
@section('content')
<div class="page-head text-center"><div class="container"><h1>Menu FauCoffee</h1><p class="mb-0 text-white-50">Temukan racikan favoritmu</p></div></div>
<section class="section">
    <div class="container">
        <form method="GET" action="{{ route('products.index') }}" class="row g-2 justify-content-center mb-4">
            @if(request('kategori'))<input type="hidden" name="kategori" value="{{ request('kategori') }}">@endif
            <div class="col-12 col-md-5"><input type="text" name="q" value="{{ request('q') }}" class="form-control rounded-pill px-4" placeholder="Cari menu..."></div>
            <div class="col-7 col-md-3">
                <select name="urut" class="form-select rounded-pill px-4" onchange="this.form.submit()">
                    <option value="">Terbaru</option>
                    <option value="termurah" {{ request('urut') == 'termurah' ? 'selected' : '' }}>Harga termurah</option>
                    <option value="termahal" {{ request('urut') == 'termahal' ? 'selected' : '' }}>Harga termahal</option>
                    <option value="nama" {{ request('urut') == 'nama' ? 'selected' : '' }}>Nama A-Z</option>
                </select>
            </div>
            <div class="col-5 col-md-2"><button class="btn btn-caramel w-100">Cari</button></div>
        </form>

        <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
            <a href="{{ route('products.index') }}" class="btn btn-sm {{ !request('kategori') ? 'btn-caramel' : 'btn-outline-dark-fau' }}">Semua</a>
            @foreach($categories as $category)
                <a href="{{ route('products.index', ['kategori' => $category->id]) }}" class="btn btn-sm {{ request('kategori') == $category->id ? 'btn-caramel' : 'btn-outline-dark-fau' }}">{{ $category->name }}</a>
            @endforeach
        </div>

        <p class="text-center text-muted small mb-4">Menampilkan {{ $products->total() }} produk@if(request('q')) untuk “{{ request('q') }}”@endif</p>

        <div class="row g-4">
            @forelse($products as $product)
                @include('public._card', ['product' => $product])
            @empty
                <div class="col-12 text-center py-5">
                    <div style="font-size:3rem">☕</div>
                    <h5 class="mt-2">Produk tidak ditemukan</h5>
                    <p class="text-muted">Coba kata kunci atau kategori lain.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark-fau">Lihat semua menu</a>
                </div>
            @endforelse
        </div>
        <div class="mt-5 d-flex justify-content-center">{{ $products->links() }}</div>
    </div>
</section>
@endsection
