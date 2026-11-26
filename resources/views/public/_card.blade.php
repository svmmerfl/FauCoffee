<div class="col-12 col-sm-6 col-lg-4">
    <div class="card card-fau">
        <div class="img-wrap"><img src="{{ $product->image_url }}" alt="{{ $product->name }}"></div>
        <div class="card-body">
            <span class="badge badge-cat mb-2">{{ $product->category->name }}</span>
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="small text-muted">{{ \Illuminate\Support\Str::limit($product->description, 70) }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="price">{{ $product->formatted_price }}</span>
                <a href="{{ route('products.show', $product) }}" class="btn btn-caramel btn-sm">Detail</a>
            </div>
        </div>
    </div>
</div>
