@extends('layouts.admin')
@section('title', 'Edit Kategori')
@section('content')
<h2 class="mb-4">Edit Kategori</h2>
<div class="stat">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf @method('PUT')
        @include('admin.categories._form')
    </form>
</div>
@endsection
