@extends('layouts.app')
@section('title', $product->name)
@section('content')
<section class="section">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4 small">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-caramel">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none text-caramel">Menu</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index', ['kategori' => $product->category_id]) }}" class="text-decoration-none text-caramel">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>
        <div class="row g-5 align-items-center">
            <div class="col-md-6"><img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="detail-img"></div>
            <div class="col-md-6">
                <span class="badge badge-cat mb-2">{{ $product->category->name }}</span>
                <h1>{{ $product->name }}</h1>
                <h3 class="price my-3">{{ $product->formatted_price }}</h3>
                <p>{{ $product->description ?: 'Belum ada deskripsi untuk produk ini.' }}</p>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a target="_blank" rel="noopener" class="btn btn-caramel"
                       href="https://wa.me/{{ config('faucoffee.whatsapp') }}?text={{ rawurlencode('Halo FauCoffee, saya ingin memesan ' . $product->name . '.') }}">Pesan via WhatsApp</a>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark-fau">Kembali ke Menu</a>
                </div>
            </div>
        </div>
        @if($related->count())
        <hr class="my-5">
        <h3 class="mb-4">Produk Serupa</h3>
        <div class="row g-4">
            @foreach($related as $item) @include('public._card', ['product' => $item]) @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
