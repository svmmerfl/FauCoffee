@if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">-- Pilih kategori --</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}" {{ old('category_id', $product->category_id ?? '') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
            @endforeach
        </select>
        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price ?? '') }}">
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Nama Produk</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name ?? '') }}">
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Foto Produk (JPG/PNG/WEBP, maks. 2 MB)</label>
    @isset($product)
        <div class="mb-2"><img src="{{ $product->image_url }}" class="thumb" style="width:110px;height:110px" alt=""></div>
    @endisset
    <input type="file" name="image" id="imageInput" accept="image/*" class="form-control @error('image') is-invalid @enderror">
    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <img id="preview" class="thumb d-none mt-2" style="width:110px;height:110px" alt="Pratinjau">
    @isset($product)<div class="form-text">Kosongkan jika tidak ingin mengganti foto.</div>@endisset
</div>
<button class="btn btn-caramel">Simpan</button>
<a href="{{ route('admin.products.index') }}" class="btn btn-outline-dark-fau">Batal</a>

<script>
document.getElementById('imageInput').addEventListener('change', function () {
    var img = document.getElementById('preview');
    if (this.files && this.files[0]) {
        img.src = URL.createObjectURL(this.files[0]);
        img.classList.remove('d-none');
    } else {
        img.classList.add('d-none');
    }
});
</script>
