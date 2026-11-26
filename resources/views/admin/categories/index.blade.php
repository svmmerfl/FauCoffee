@extends('layouts.admin')
@section('title', 'Kategori')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kategori</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-caramel">+ Tambah Kategori</a>
</div>
<div class="stat">
<div class="table-responsive">
<table class="table align-middle">
    <thead><tr><th>#</th><th>Nama</th><th>Deskripsi</th><th>Jumlah Produk</th><th class="text-end">Aksi</th></tr></thead>
    <tbody>
    @forelse($categories as $c)
        <tr>
            <td>{{ $categories->firstItem() + $loop->index }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ \Illuminate\Support\Str::limit($c->description, 60) }}</td>
            <td>{{ $c->products_count }}</td>
            <td class="text-end text-nowrap">
                <a href="{{ route('admin.categories.edit', $c) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.categories.destroy', $c) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori ini beserta semua produknya?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center text-muted">Belum ada kategori.</td></tr>
    @endforelse
    </tbody>
</table>
</div>
{{ $categories->links() }}
</div>
@endsection
