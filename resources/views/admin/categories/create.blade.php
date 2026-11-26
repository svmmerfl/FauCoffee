@extends('layouts.admin')
@section('title', 'Tambah Kategori')
@section('content')
<h2 class="mb-4">Tambah Kategori</h2>
<div class="stat">
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        @include('admin.categories._form')
    </form>
</div>
@endsection
