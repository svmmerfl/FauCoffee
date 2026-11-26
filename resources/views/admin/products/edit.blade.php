@extends('layouts.admin')
@section('title', 'Edit Produk')
@section('content')
<h2 class="mb-4">Edit Produk</h2>
<div class="stat">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.products._form')
    </form>
</div>
@endsection
