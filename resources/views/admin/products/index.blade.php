@extends('layouts.admin')
@section('title', 'Produk')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Produk</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-caramel">+ Tambah Produk</a>
</div>
<div class="stat">
<form method="GET" class="row g-2 mb-3">
    <div class="col-md-5"><input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama produk..."></div>
    <div class="col-md-4">
        <select name="kategori" class="form-select">
            <option value="">Semua kategori</option>
            @foreach($categories as $c)<option value="{{ $c->id }}" {{ request('kategori') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>@endforeach
        </select>
    </div>
    <div class="col-md-3 d-flex gap-2"><button class="btn btn-caramel flex-fill">Cari</button><a href="{{ route('admin.products.index') }}" class="btn btn-outline-dark-fau">Reset</a></div>
</form>
<div class="table-responsive">
<table class="table align-middle">
    <thead><tr><th>#</th><th>Foto</th><th>Nama</th><th>Kategori</th><th>Harga</th><th class="text-end">Aksi</th></tr></thead>
    <tbody>
    @forelse($products as $p)
        <tr>
            <td>{{ $products->firstItem() + $loop->index }}</td>
            <td><img src="{{ $p->image_url }}" class="thumb" alt=""></td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category->name }}</td>
            <td>{{ $p->formatted_price }}</td>
            <td class="text-end text-nowrap">
                <a href="{{ route('products.show', $p) }}" target="_blank" class="btn btn-sm btn-info text-white">Lihat</a>
                <a href="{{ route('admin.products.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.products.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus produk ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="text-center text-muted py-4">Produk tidak ditemukan.</td></tr>
    @endforelse
    </tbody>
</table>
</div>
{{ $products->links() }}
</div>
@endsection
