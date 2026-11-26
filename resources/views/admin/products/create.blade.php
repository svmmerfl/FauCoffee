@extends('layouts.admin')
@section('title', 'Tambah Produk')
@section('content')
<h2 class="mb-4">Tambah Produk</h2>
<div class="stat">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.products._form')
    </form>
</div>
@endsection
